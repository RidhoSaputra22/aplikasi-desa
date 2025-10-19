<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Pages;

use App\Filament\Admin\Resources\AparaturDesas\AparaturDesaResource;
use App\Models\AparaturDesa;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAparaturDesa extends CreateRecord
{
    protected static string $resource = AparaturDesaResource::class;

    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.

        $isKepalaLurahExist = AparaturDesa::where('jabatan', 'Kepala Lurah')->exists();

        if ($isKepalaLurahExist) {
            Notification::make()
                ->warning()
                ->title('Kepala Lurah Sudah Ada')
                ->persistent()
                ->send();

            $this->halt();
        }
    }
}

<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Pages;

use App\Filament\Admin\Resources\AparaturDesas\AparaturDesaResource;
use App\Models\AparaturDesa;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAparaturDesa extends CreateRecord
{
    protected static string $resource = AparaturDesaResource::class;

    protected function handleRecordCreation(array $data): Model
    {

        if ($data['jabatan'] === 'Kepala Lurah') {
            $existingKepalaLurah = AparaturDesa::where('jabatan', 'Kepala Lurah')->first();
            if ($existingKepalaLurah) {
                Notification::make()
                    ->title('Gagal menambahkan Aparatur Desa.')
                    ->body('Sudah ada Aparatur Desa dengan jabatan "Kepala Lurah". Hanya boleh ada satu Kepala Lurah.')
                    ->danger()
                    ->send();

                $this->halt();
            }
        }

        return parent::handleRecordCreation($data);
    }
}

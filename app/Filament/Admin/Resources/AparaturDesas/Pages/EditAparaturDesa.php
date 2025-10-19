<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Pages;

use App\Models\AparaturDesa;
use Filament\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\AparaturDesas\AparaturDesaResource;

class EditAparaturDesa extends EditRecord
{
    protected static string $resource = AparaturDesaResource::class;

    protected function getHeaderActions(): array
    {
        if ($this->record->jabatan == 'Kepala Lurah') {
            return [];
        }

        return [
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $isKepalaLurahExceptThisExist = AparaturDesa::where('jabatan', 'Kepala Lurah')->where('id', '!=', $record->id)->exists();

        if ($isKepalaLurahExceptThisExist && $data['Kepala Lurah'] == 'Kepala Lurah') {
            Notification::make()
                ->warning()
                ->title('Kepala Lurah Sudah Ada')
                ->persistent()
                ->send();

            $this->halt();
        }

        $record->update($data);

        return $record;
    }
}

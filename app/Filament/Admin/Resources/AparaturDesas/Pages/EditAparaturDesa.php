<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Pages;

use App\Filament\Admin\Resources\AparaturDesas\AparaturDesaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAparaturDesa extends EditRecord
{
    protected static string $resource = AparaturDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\BeritaDesas\Pages;

use App\Filament\Admin\Resources\BeritaDesas\BeritaDesaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBeritaDesa extends EditRecord
{
    protected static string $resource = BeritaDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

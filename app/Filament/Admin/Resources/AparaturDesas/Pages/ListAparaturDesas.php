<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Pages;

use App\Filament\Admin\Resources\AparaturDesas\AparaturDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAparaturDesas extends ListRecords
{
    protected static string $resource = AparaturDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

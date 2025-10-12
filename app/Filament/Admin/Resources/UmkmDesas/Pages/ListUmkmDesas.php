<?php

namespace App\Filament\Admin\Resources\UmkmDesas\Pages;

use App\Filament\Admin\Resources\UmkmDesas\UmkmDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUmkmDesas extends ListRecords
{
    protected static string $resource = UmkmDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

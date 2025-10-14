<?php

namespace App\Filament\Admin\Resources\LahanWilayahs\Pages;

use App\Filament\Admin\Resources\LahanWilayahs\LahanWilayahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLahanWilayahs extends ListRecords
{
    protected static string $resource = LahanWilayahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

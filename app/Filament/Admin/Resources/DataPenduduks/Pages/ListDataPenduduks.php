<?php

namespace App\Filament\Admin\Resources\DataPenduduks\Pages;

use App\Filament\Admin\Resources\DataPenduduks\DataPendudukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPenduduks extends ListRecords
{
    protected static string $resource = DataPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

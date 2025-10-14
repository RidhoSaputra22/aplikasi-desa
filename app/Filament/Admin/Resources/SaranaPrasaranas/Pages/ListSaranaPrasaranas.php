<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranas\Pages;

use App\Filament\Admin\Resources\SaranaPrasaranas\SaranaPrasaranaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSaranaPrasaranas extends ListRecords
{
    protected static string $resource = SaranaPrasaranaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

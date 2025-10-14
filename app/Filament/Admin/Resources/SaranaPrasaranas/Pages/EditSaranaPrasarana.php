<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranas\Pages;

use App\Filament\Admin\Resources\SaranaPrasaranas\SaranaPrasaranaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSaranaPrasarana extends EditRecord
{
    protected static string $resource = SaranaPrasaranaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

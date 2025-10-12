<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Pages;

use App\Filament\Admin\Resources\ParawisataDesas\ParawisataDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParawisataDesas extends ListRecords
{
    protected static string $resource = ParawisataDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

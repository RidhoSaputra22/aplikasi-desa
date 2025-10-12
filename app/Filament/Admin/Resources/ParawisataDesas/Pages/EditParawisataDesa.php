<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Pages;

use App\Filament\Admin\Resources\ParawisataDesas\ParawisataDesaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditParawisataDesa extends EditRecord
{
    protected static string $resource = ParawisataDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

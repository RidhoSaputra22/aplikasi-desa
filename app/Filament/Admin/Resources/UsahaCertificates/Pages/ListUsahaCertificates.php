<?php

namespace App\Filament\Admin\Resources\UsahaCertificates\Pages;

use App\Filament\Admin\Resources\UsahaCertificates\UsahaCertificateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsahaCertificates extends ListRecords
{
    protected static string $resource = UsahaCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

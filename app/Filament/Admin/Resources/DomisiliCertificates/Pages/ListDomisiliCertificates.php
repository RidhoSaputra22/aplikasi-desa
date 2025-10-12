<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Pages;

use App\Filament\Admin\Resources\DomisiliCertificates\DomisiliCertificateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDomisiliCertificates extends ListRecords
{
    protected static string $resource = DomisiliCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

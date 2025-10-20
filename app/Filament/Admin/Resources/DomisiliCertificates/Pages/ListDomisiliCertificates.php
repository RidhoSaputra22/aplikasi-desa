<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\DomisiliCertificates\Widgets\DomisiliCertStat;
use App\Filament\Admin\Resources\DomisiliCertificates\DomisiliCertificateResource;

class ListDomisiliCertificates extends ListRecords
{
    protected static string $resource = DomisiliCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DomisiliCertStat::class,
        ];
    }
}

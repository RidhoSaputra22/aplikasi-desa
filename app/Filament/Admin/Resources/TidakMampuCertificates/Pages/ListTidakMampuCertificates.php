<?php

namespace App\Filament\Admin\Resources\TidakMampuCertificates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\TidakMampuCertificates\Widgets\TidakMampuCertStat;
use App\Filament\Admin\Resources\TidakMampuCertificates\TidakMampuCertificateResource;

class ListTidakMampuCertificates extends ListRecords
{
    protected static string $resource = TidakMampuCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TidakMampuCertStat::class,
        ];
    }
}

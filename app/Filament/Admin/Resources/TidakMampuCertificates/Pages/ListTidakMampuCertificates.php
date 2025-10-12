<?php

namespace App\Filament\Admin\Resources\TidakMampuCertificates\Pages;

use App\Filament\Admin\Resources\TidakMampuCertificates\TidakMampuCertificateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTidakMampuCertificates extends ListRecords
{
    protected static string $resource = TidakMampuCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\DeathCertificates\Widgets\DeathCertStat;
use App\Filament\Admin\Resources\DeathCertificates\DeathCertificateResource;

class ListDeathCertificates extends ListRecords
{
    protected static string $resource = DeathCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DeathCertStat::class,
        ];
    }
}

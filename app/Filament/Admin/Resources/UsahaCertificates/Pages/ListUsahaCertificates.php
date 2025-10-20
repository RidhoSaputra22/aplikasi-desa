<?php

namespace App\Filament\Admin\Resources\UsahaCertificates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\UsahaCertificates\Widgets\UsahaCertStat;
use App\Filament\Admin\Resources\UsahaCertificates\UsahaCertificateResource;

class ListUsahaCertificates extends ListRecords
{
    protected static string $resource = UsahaCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UsahaCertStat::class,
        ];
    }
}

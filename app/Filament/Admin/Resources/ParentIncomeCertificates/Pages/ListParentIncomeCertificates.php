<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\ParentIncomeCertificates\Widgets\ParentIncomeCertStat;
use App\Filament\Admin\Resources\ParentIncomeCertificates\ParentIncomeCertificateResource;

class ListParentIncomeCertificates extends ListRecords
{
    protected static string $resource = ParentIncomeCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ParentIncomeCertStat::class,
        ];
    }
}

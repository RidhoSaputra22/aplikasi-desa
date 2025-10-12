<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Pages;

use App\Filament\Admin\Resources\DomisiliCertificates\DomisiliCertificateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDomisiliCertificate extends EditRecord
{
    protected static string $resource = DomisiliCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

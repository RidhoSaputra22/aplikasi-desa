<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates\Pages;

use App\Filament\Admin\Resources\ParentIncomeCertificates\ParentIncomeCertificateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditParentIncomeCertificate extends EditRecord
{
    protected static string $resource = ParentIncomeCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\BirthCertificates\Pages;

use App\Filament\Admin\Resources\BirthCertificates\BirthCertificateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirthCertificate extends EditRecord
{
    protected static string $resource = BirthCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\UsahaCertificates\Pages;

use App\Filament\Admin\Resources\UsahaCertificates\UsahaCertificateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUsahaCertificate extends EditRecord
{
    protected static string $resource = UsahaCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\TidakMampuCertificates\Pages;

use App\Filament\Admin\Resources\TidakMampuCertificates\TidakMampuCertificateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTidakMampuCertificate extends EditRecord
{
    protected static string $resource = TidakMampuCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

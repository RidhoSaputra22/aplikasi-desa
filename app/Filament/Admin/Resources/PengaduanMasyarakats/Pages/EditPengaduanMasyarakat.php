<?php

namespace App\Filament\Admin\Resources\PengaduanMasyarakats\Pages;

use App\Filament\Admin\Resources\PengaduanMasyarakats\PengaduanMasyarakatResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengaduanMasyarakat extends EditRecord
{
    protected static string $resource = PengaduanMasyarakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

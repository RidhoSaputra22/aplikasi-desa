<?php

namespace App\Filament\Admin\Resources\PengaduanMasyarakats\Pages;

use App\Filament\Admin\Resources\PengaduanMasyarakats\PengaduanMasyarakatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengaduanMasyarakats extends ListRecords
{
    protected static string $resource = PengaduanMasyarakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

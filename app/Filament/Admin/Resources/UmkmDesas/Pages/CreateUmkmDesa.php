<?php

namespace App\Filament\Admin\Resources\UmkmDesas\Pages;

use App\Models\KategoriUmkm;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\UmkmDesas\UmkmDesaResource;

class CreateUmkmDesa extends CreateRecord
{
    protected static string $resource = UmkmDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Tambah Kategori')
                ->color('info')

                ->schema([
                    TextInput::make('nama_kategori')
                        ->required()
                        ->label('Nama Kategori'),
                ])
                ->action(function (array $data): void {
                    KategoriUmkm::create($data);
                    Notification::make()
                        ->title('Kategori berhasil ditambahkan')
                        ->success()
                        ->send();
                })
        ];
    }
}

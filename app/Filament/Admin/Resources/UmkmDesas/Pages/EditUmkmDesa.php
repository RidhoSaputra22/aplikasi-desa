<?php

namespace App\Filament\Admin\Resources\UmkmDesas\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\UmkmDesas\UmkmDesaResource;
use App\Filament\Admin\Resources\UmkmDesas\Components\AddKategoriAction;
use App\Models\KategoriUmkm;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class EditUmkmDesa extends EditRecord
{
    protected static string $resource = UmkmDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
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

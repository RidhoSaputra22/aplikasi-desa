<?php

namespace App\Filament\Admin\Resources\UmkmDesas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UmkmDesaForm
{


    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_produk')
                    ->required(),
                RichEditor::make('deskripsi')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('harga')
                    ->prefix('Rp ')
                    ->numeric(),
                TextInput::make('no_hp')
                    ->label('No. Handphone')
                    ->tel(),
                Select::make('kategori_umkm_id')
                    ->relationship('kategoriUmkm', 'nama_kategori')
                    ->preload()
                    ->searchable()
                    ->required(),
                FileUpload::make('gambar')
                    ->visibility('public')
                    ->disk('public')
                    ->image()
                    ->columnSpanFull(),
            ])->columns(3);
    }
}

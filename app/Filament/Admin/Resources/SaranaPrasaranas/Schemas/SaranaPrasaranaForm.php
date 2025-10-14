<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SaranaPrasaranaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('foto_sarana')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('nama_sarana')
                    ->required(),
                TextInput::make('jenis_sarana')
                    ->required(),
                TextInput::make('kondisi_sarana')
                    ->required(),
                TextInput::make('kapasitas_sarana')
                    ->required()
                    ->numeric(),
                TextInput::make('lokasi_sarana')
                    ->required(),
                Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }
}

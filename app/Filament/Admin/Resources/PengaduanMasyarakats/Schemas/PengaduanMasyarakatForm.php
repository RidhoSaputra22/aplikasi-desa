<?php

namespace App\Filament\Admin\Resources\PengaduanMasyarakats\Schemas;

use App\Enums\PengaduanStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PengaduanMasyarakatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
                TextInput::make('alamat'),
                Textarea::make('isi_laporan')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('code')
                    ->required(),
                Select::make('confirmation_status')
                    ->options(PengaduanStatus::class)
                    ->default('pending')
                    ->required(),

                FileUpload::make('foto')
                    ->multiple()
                    ->disk('local')
                    ->directory('complaints')
                    ->columnSpanFull(),
            ])->columns(3);
    }
}

<?php

namespace App\Filament\Admin\Resources\LahanWilayahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LahanWilayahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lahan')
                    ->required(),
                TextInput::make('jenis_lahan')
                    ->required(),
                TextInput::make('luas_lahan')
                    ->required()
                    ->numeric(),
            ]);
    }
}

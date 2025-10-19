<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Schemas;

use App\Models\AparaturDesa;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AparaturDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nip')
                    ->label('NIP')
                    ->required(),
                TextInput::make('jabatan')
                    ->required(),
                FileUpload::make('foto')
                    ->visibility('public')
                    ->disk('public')
                    ->image()
                    ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Get;

class ParawisataDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->image()
                    ->columnSpanFull()
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('alamat'),
                RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('galeri')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('lat'),
                TextInput::make('long'),
            ])
            ->columns(3);
    }
}

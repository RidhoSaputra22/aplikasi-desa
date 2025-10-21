<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class ParawisataDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->columnSpanFull()
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->required(),

                TextInput::make('title')
                    ->required(),
                TextInput::make('alamat')
                    ->columnSpan(2),
                RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('galeri')
                    ->multiple()
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),

                TextInput::make('link_maps')
                    ->label('Link Maps')
                    ->placeholder('https://www.google.com/maps/place/...')
                    ->helperText('Masukkan link lokasi dari Google Maps')
                    ->columnSpanFull()
                    ->reactive(),

            ])
            ->columns(3);
    }
}
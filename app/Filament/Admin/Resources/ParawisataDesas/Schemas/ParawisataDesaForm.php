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
                    ->required(),

                TextInput::make('title')
                    ->required()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if ($get('slug') !== Str::slug($state)) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->disabled()
                    ->unique(table: 'parawisata_desas', ignorable: fn($record) => $record)
                    ->required(),
                TextInput::make('alamat'),
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
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if ($state && preg_match('/@([-+]?[0-9]*\.?[0-9]+),\s*([-+]?[0-9]*\.?[0-9]+)/', $state, $matches)) {
                            $set('lat', $matches[1]);
                            $set('long', $matches[2]);
                        }
                    }),
                TextInput::make('long')
                    ->disabled()
                    ->label('Longitude'),
                TextInput::make('lat')
                    ->disabled()
                    ->label('Latitude'),

            ])
            ->columns(3);
    }
}

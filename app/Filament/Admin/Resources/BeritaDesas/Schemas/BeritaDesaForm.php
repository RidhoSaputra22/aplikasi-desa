<?php

namespace App\Filament\Admin\Resources\BeritaDesas\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class BeritaDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->disk('public')
                    ->image()
                    ->columnSpanFull()
                    ->visibility('public')
                    ->required(),
                TextInput::make('judul')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if ($get('slug') !== Str::slug($state)) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->reactive()
                    ->unique(table: 'berita_desas', ignorable: fn($record) => $record)
                    ->required(),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

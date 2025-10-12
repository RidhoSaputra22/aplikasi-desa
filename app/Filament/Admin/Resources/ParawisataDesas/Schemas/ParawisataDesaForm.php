<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ParawisataDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('galeri')
                    ->image()
                    ->multiple()
                    ->columnSpanFull(),
            ]);
    }
}

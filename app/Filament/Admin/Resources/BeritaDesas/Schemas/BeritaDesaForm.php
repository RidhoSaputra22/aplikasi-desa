<?php

namespace App\Filament\Admin\Resources\BeritaDesas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

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
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

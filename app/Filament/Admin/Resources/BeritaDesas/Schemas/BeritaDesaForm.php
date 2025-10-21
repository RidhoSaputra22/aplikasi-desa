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
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->columnSpanFull()
                    ->visibility('public')
                    ->required(),
                TextInput::make('judul')
                    ->required(),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
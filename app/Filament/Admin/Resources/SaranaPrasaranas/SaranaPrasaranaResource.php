<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranas;

use App\Filament\Admin\Resources\SaranaPrasaranas\Pages\CreateSaranaPrasarana;
use App\Filament\Admin\Resources\SaranaPrasaranas\Pages\EditSaranaPrasarana;
use App\Filament\Admin\Resources\SaranaPrasaranas\Pages\ListSaranaPrasaranas;
use App\Filament\Admin\Resources\SaranaPrasaranas\Schemas\SaranaPrasaranaForm;
use App\Filament\Admin\Resources\SaranaPrasaranas\Tables\SaranaPrasaranasTable;
use App\Models\SaranaPrasarana;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SaranaPrasaranaResource extends Resource
{
    protected static ?string $model = SaranaPrasarana::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;

    protected static ?string $recordTitleAttribute = 'nama_sarana';

    public static function form(Schema $schema): Schema
    {
        return SaranaPrasaranaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SaranaPrasaranasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSaranaPrasaranas::route('/'),
            'create' => CreateSaranaPrasarana::route('/create'),
            'edit' => EditSaranaPrasarana::route('/{record}/edit'),
        ];
    }
}

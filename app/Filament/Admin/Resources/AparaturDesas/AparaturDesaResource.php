<?php

namespace App\Filament\Admin\Resources\AparaturDesas;

use App\Filament\Admin\Resources\AparaturDesas\Pages\CreateAparaturDesa;
use App\Filament\Admin\Resources\AparaturDesas\Pages\EditAparaturDesa;
use App\Filament\Admin\Resources\AparaturDesas\Pages\ListAparaturDesas;
use App\Filament\Admin\Resources\AparaturDesas\Schemas\AparaturDesaForm;
use App\Filament\Admin\Resources\AparaturDesas\Tables\AparaturDesasTable;
use App\Models\AparaturDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AparaturDesaResource extends Resource
{
    protected static ?string $model = AparaturDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;
    protected static string|\UnitEnum|null $navigationGroup = 'Data Lurah';
    protected static ?string $navigationLabel = 'Aparatur Lurah';
    protected static ?string $pluralModelLabel = 'Aparatur Lurah';
    protected static ?string $modelLabel = 'Aparatur Lurah';



    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return AparaturDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AparaturDesasTable::configure($table);
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
            'index' => ListAparaturDesas::route('/'),
            'create' => CreateAparaturDesa::route('/create'),
            'edit' => EditAparaturDesa::route('/{record}/edit'),
        ];
    }
}

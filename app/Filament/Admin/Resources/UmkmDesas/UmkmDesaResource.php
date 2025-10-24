<?php

namespace App\Filament\Admin\Resources\UmkmDesas;

use App\Filament\Admin\Resources\UmkmDesas\Pages\CreateUmkmDesa;
use App\Filament\Admin\Resources\UmkmDesas\Pages\EditUmkmDesa;
use App\Filament\Admin\Resources\UmkmDesas\Pages\ListUmkmDesas;
use App\Filament\Admin\Resources\UmkmDesas\Schemas\UmkmDesaForm;
use App\Filament\Admin\Resources\UmkmDesas\Tables\UmkmDesasTable;
use App\Models\UmkmDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UmkmDesaResource extends Resource
{
    protected static ?string $model = UmkmDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;
    protected static string|\UnitEnum|null $navigationGroup = 'Data Lurah';
    protected static ?string $navigationLabel = 'UMKM Tuwung';
    protected static ?string $pluralModelLabel = 'UMKM Tuwung';
    protected static ?string $modelLabel = 'UMKM Tuwung';

    protected static ?string $recordTitleAttribute = 'nama_produk';

    public static function form(Schema $schema): Schema
    {
        return UmkmDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UmkmDesasTable::configure($table);
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
            'index' => ListUmkmDesas::route('/'),
            'create' => CreateUmkmDesa::route('/create'),
            'edit' => EditUmkmDesa::route('/{record}/edit'),
        ];
    }
}

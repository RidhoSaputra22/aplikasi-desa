<?php

namespace App\Filament\Admin\Resources\LahanWilayahs;

use App\Filament\Admin\Resources\LahanWilayahs\Pages\CreateLahanWilayah;
use App\Filament\Admin\Resources\LahanWilayahs\Pages\EditLahanWilayah;
use App\Filament\Admin\Resources\LahanWilayahs\Pages\ListLahanWilayahs;
use App\Filament\Admin\Resources\LahanWilayahs\Schemas\LahanWilayahForm;
use App\Filament\Admin\Resources\LahanWilayahs\Tables\LahanWilayahsTable;
use App\Models\LahanWilayah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LahanWilayahResource extends Resource
{
    protected static ?string $model = LahanWilayah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static ?string $recordTitleAttribute = 'nama_lahan';

    public static function form(Schema $schema): Schema
    {
        return LahanWilayahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LahanWilayahsTable::configure($table);
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
            'index' => ListLahanWilayahs::route('/'),
            'create' => CreateLahanWilayah::route('/create'),
            'edit' => EditLahanWilayah::route('/{record}/edit'),
        ];
    }
}

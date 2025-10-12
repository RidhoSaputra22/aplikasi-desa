<?php

namespace App\Filament\Admin\Resources\BeritaDesas;

use App\Filament\Admin\Resources\BeritaDesas\Pages\CreateBeritaDesa;
use App\Filament\Admin\Resources\BeritaDesas\Pages\EditBeritaDesa;
use App\Filament\Admin\Resources\BeritaDesas\Pages\ListBeritaDesas;
use App\Filament\Admin\Resources\BeritaDesas\Schemas\BeritaDesaForm;
use App\Filament\Admin\Resources\BeritaDesas\Tables\BeritaDesasTable;
use App\Models\BeritaDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BeritaDesaResource extends Resource
{
    protected static ?string $model = BeritaDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;
    protected static string|\UnitEnum|null $navigationGroup = 'Data Desa';
    protected static ?string $navigationLabel = 'Berita Desa';
    protected static ?string $pluralModelLabel = 'Berita Desa';
    protected static ?string $modelLabel = 'Berita Desa';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return BeritaDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BeritaDesasTable::configure($table);
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
            'index' => ListBeritaDesas::route('/'),
            'create' => CreateBeritaDesa::route('/create'),
            'edit' => EditBeritaDesa::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\PengaduanMasyarakats;

use App\Filament\Admin\Resources\PengaduanMasyarakats\Pages\CreatePengaduanMasyarakat;
use App\Filament\Admin\Resources\PengaduanMasyarakats\Pages\EditPengaduanMasyarakat;
use App\Filament\Admin\Resources\PengaduanMasyarakats\Pages\ListPengaduanMasyarakats;
use App\Filament\Admin\Resources\PengaduanMasyarakats\Schemas\PengaduanMasyarakatForm;
use App\Filament\Admin\Resources\PengaduanMasyarakats\Tables\PengaduanMasyarakatsTable;
use App\Models\PengaduanMasyarakat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengaduanMasyarakatResource extends Resource
{
    protected static ?string $model = PengaduanMasyarakat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;
    protected static string|\UnitEnum|null $navigationGroup = 'Pengaduan';
    protected static ?string $navigationLabel = 'Pengaduan Masyarakat';
    protected static ?string $pluralModelLabel = 'Pengaduan Masyarakat';
    protected static ?string $modelLabel = 'Pengaduan Masyarakat';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PengaduanMasyarakatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengaduanMasyarakatsTable::configure($table);
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
            'index' => ListPengaduanMasyarakats::route('/'),
            'create' => CreatePengaduanMasyarakat::route('/create'),
            'edit' => EditPengaduanMasyarakat::route('/{record}/edit'),
        ];
    }
}

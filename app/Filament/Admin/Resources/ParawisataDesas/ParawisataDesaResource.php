<?php

namespace App\Filament\Admin\Resources\ParawisataDesas;

use App\Filament\Admin\Resources\ParawisataDesas\Pages\CreateParawisataDesa;
use App\Filament\Admin\Resources\ParawisataDesas\Pages\EditParawisataDesa;
use App\Filament\Admin\Resources\ParawisataDesas\Pages\ListParawisataDesas;
use App\Filament\Admin\Resources\ParawisataDesas\Schemas\ParawisataDesaForm;
use App\Filament\Admin\Resources\ParawisataDesas\Tables\ParawisataDesasTable;
use App\Models\ParawisataDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParawisataDesaResource extends Resource
{
    protected static ?string $model = ParawisataDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;
    protected static string|\UnitEnum|null $navigationGroup = 'Data Desa';
    protected static ?string $navigationLabel = 'Parawisata Desa';
    protected static ?string $pluralModelLabel = 'Parawisata Desa';
    protected static ?string $modelLabel = 'Parawisata Desa';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ParawisataDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParawisataDesasTable::configure($table);
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
            'index' => ListParawisataDesas::route('/'),
            'create' => CreateParawisataDesa::route('/create'),
            'edit' => EditParawisataDesa::route('/{record}/edit'),
        ];
    }
}

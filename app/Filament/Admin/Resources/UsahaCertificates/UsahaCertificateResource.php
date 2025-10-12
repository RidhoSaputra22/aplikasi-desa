<?php

namespace App\Filament\Admin\Resources\UsahaCertificates;

use App\Filament\Admin\Resources\UsahaCertificates\Pages\CreateUsahaCertificate;
use App\Filament\Admin\Resources\UsahaCertificates\Pages\EditUsahaCertificate;
use App\Filament\Admin\Resources\UsahaCertificates\Pages\ListUsahaCertificates;
use App\Filament\Admin\Resources\UsahaCertificates\Schemas\UsahaCertificateForm;
use App\Filament\Admin\Resources\UsahaCertificates\Tables\UsahaCertificatesTable;
use App\Models\UsahaCertificate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UsahaCertificateResource extends Resource
{
    protected static ?string $model = UsahaCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Usaha';
    protected static ?string $pluralModelLabel = 'Surat Usaha';
    protected static ?string $modelLabel = 'Surat Usaha';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UsahaCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsahaCertificatesTable::configure($table);
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
            'index' => ListUsahaCertificates::route('/'),
            'create' => CreateUsahaCertificate::route('/create'),
            'edit' => EditUsahaCertificate::route('/{record}/edit'),
        ];
    }
}

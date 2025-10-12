<?php

namespace App\Filament\Admin\Resources\DeathCertificates;

use App\Filament\Admin\Resources\DeathCertificates\Pages\CreateDeathCertificate;
use App\Filament\Admin\Resources\DeathCertificates\Pages\EditDeathCertificate;
use App\Filament\Admin\Resources\DeathCertificates\Pages\ListDeathCertificates;
use App\Filament\Admin\Resources\DeathCertificates\Schemas\DeathCertificateForm;
use App\Filament\Admin\Resources\DeathCertificates\Tables\DeathCertificatesTable;
use App\Models\DeathCertificate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DeathCertificateResource extends Resource
{
    protected static ?string $model = DeathCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Kematian';
    protected static ?string $pluralModelLabel = 'Surat Kematian';
    protected static ?string $modelLabel = 'Surat Kematian';



    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DeathCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeathCertificatesTable::configure($table);
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
            'index' => ListDeathCertificates::route('/'),
            'create' => CreateDeathCertificate::route('/create'),
            'edit' => EditDeathCertificate::route('/{record}/edit'),
        ];
    }
}

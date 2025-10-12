<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates;

use App\Filament\Admin\Resources\DomisiliCertificates\Pages\CreateDomisiliCertificate;
use App\Filament\Admin\Resources\DomisiliCertificates\Pages\EditDomisiliCertificate;
use App\Filament\Admin\Resources\DomisiliCertificates\Pages\ListDomisiliCertificates;
use App\Filament\Admin\Resources\DomisiliCertificates\Schemas\DomisiliCertificateForm;
use App\Filament\Admin\Resources\DomisiliCertificates\Tables\DomisiliCertificatesTable;
use App\Models\DomisiliCertificate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DomisiliCertificateResource extends Resource
{
    protected static ?string $model = DomisiliCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Domisili';
    protected static ?string $pluralModelLabel = 'Surat Domisili';
    protected static ?string $modelLabel = 'Surat Domisili';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DomisiliCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DomisiliCertificatesTable::configure($table);
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
            'index' => ListDomisiliCertificates::route('/'),
            'create' => CreateDomisiliCertificate::route('/create'),
            'edit' => EditDomisiliCertificate::route('/{record}/edit'),
        ];
    }
}

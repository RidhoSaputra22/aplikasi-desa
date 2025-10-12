<?php

namespace App\Filament\Admin\Resources\TidakMampuCertificates;

use App\Filament\Admin\Resources\TidakMampuCertificates\Pages\CreateTidakMampuCertificate;
use App\Filament\Admin\Resources\TidakMampuCertificates\Pages\EditTidakMampuCertificate;
use App\Filament\Admin\Resources\TidakMampuCertificates\Pages\ListTidakMampuCertificates;
use App\Filament\Admin\Resources\TidakMampuCertificates\Schemas\TidakMampuCertificateForm;
use App\Filament\Admin\Resources\TidakMampuCertificates\Tables\TidakMampuCertificatesTable;
use App\Models\TidakMampuCertificate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TidakMampuCertificateResource extends Resource
{
    protected static ?string $model = TidakMampuCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Tidak Mampu';
    protected static ?string $pluralModelLabel = 'Surat Tidak Mampu';
    protected static ?string $modelLabel = 'Surat Tidak Mampu';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TidakMampuCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TidakMampuCertificatesTable::configure($table);
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
            'index' => ListTidakMampuCertificates::route('/'),
            'create' => CreateTidakMampuCertificate::route('/create'),
            'edit' => EditTidakMampuCertificate::route('/{record}/edit'),
        ];
    }
}

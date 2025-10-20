<?php

namespace App\Filament\Admin\Resources\BirthCertificates;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\BirthCertificate;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Admin\Resources\BirthCertificates\Widgets\BirthCertStat;
use App\Filament\Admin\Resources\BirthCertificates\Pages\EditBirthCertificate;
use App\Filament\Admin\Resources\BirthCertificates\Pages\ListBirthCertificates;
use App\Filament\Admin\Resources\BirthCertificates\Pages\CreateBirthCertificate;
use App\Filament\Admin\Resources\BirthCertificates\Schemas\BirthCertificateForm;
use App\Filament\Admin\Resources\BirthCertificates\Tables\BirthCertificatesTable;

class BirthCertificateResource extends Resource
{
    protected static ?string $model = BirthCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Kelahiran';
    protected static ?string $pluralModelLabel = 'Surat Kelahiran';
    protected static ?string $modelLabel = 'Surat Kelahiran';
    // protected static ?string $slug = 'Surat-Kelahiran';


    protected static ?string $recordTitleAttribute = 'baby_name';

    public static function form(Schema $schema): Schema
    {
        return BirthCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BirthCertificatesTable::configure($table);
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
            'index' => ListBirthCertificates::route('/'),
            'create' => CreateBirthCertificate::route('/create'),
            'edit' => EditBirthCertificate::route('/{record}/edit'),
        ];
    }
}

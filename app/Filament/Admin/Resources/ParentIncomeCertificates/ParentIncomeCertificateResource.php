<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates;

use App\Filament\Admin\Resources\ParentIncomeCertificates\Pages\CreateParentIncomeCertificate;
use App\Filament\Admin\Resources\ParentIncomeCertificates\Pages\EditParentIncomeCertificate;
use App\Filament\Admin\Resources\ParentIncomeCertificates\Pages\ListParentIncomeCertificates;
use App\Filament\Admin\Resources\ParentIncomeCertificates\Schemas\ParentIncomeCertificateForm;
use App\Filament\Admin\Resources\ParentIncomeCertificates\Tables\ParentIncomeCertificatesTable;
use App\Models\ParentIncomeCertificate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ParentIncomeCertificateResource extends Resource
{
    protected static ?string $model = ParentIncomeCertificate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum|null $navigationGroup = 'Surat Online';
    protected static ?string $navigationLabel = 'Surat Penghasilan Orang Tua';
    protected static ?string $pluralModelLabel = 'Surat Penghasilan Orang Tua';
    protected static ?string $modelLabel = 'Surat Penghasilan Orang Tua';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ParentIncomeCertificateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParentIncomeCertificatesTable::configure($table);
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
            'index' => ListParentIncomeCertificates::route('/'),
            'create' => CreateParentIncomeCertificate::route('/create'),
            'edit' => EditParentIncomeCertificate::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates\Schemas;

use Filament\Schemas\Schema;
use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ParentIncomeCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_surat')
                    ->label('Nomor Surat')
                    ->required(),
                FileUpload::make('attachment')
                    ->label('Lampiran')
                    ->disk('local')
                    ->directory('attachments/')
                    ->columnSpanFull()
                    ->openable(),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->label('Hari Lahir')
                    ->required(),
                TextInput::make('month_of_birth')
                    ->label('Bulan Lahir')
                    ->required(),
                TextInput::make('year_of_birth')
                    ->label('Tahun Lahir')
                    ->required(),
                Select::make('religion')
                    ->options([
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Hindu' => 'Hindu',
                        'Buddha' => 'Buddha',
                        'Konghucu' => 'Konghucu',
                    ])
                    ->label('Agama')
                    ->required(),
                TextInput::make('profession')
                    ->label('Pekerjaan')
                    ->required(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('parent_name')
                    ->label('Nama Orang Tua')
                    ->required(),
                TextInput::make('parent_place_of_birth')
                    ->label('Tempat Lahir Orang Tua')
                    ->required(),
                TextInput::make('parent_day_of_birth')
                    ->label('Hari Lahir Orang Tua')
                    ->required(),
                TextInput::make('parent_month_of_birth')
                    ->label('Bulan Lahir Orang Tua')
                    ->required(),
                TextInput::make('parent_year_of_birth')
                    ->label('Tahun Lahir Orang Tua')
                    ->required(),
                TextInput::make('parent_religion')
                    ->label('Agama Orang Tua')
                    ->required(),
                TextInput::make('parent_profession')
                    ->label('Pekerjaan Orang Tua')
                    ->required(),
                Textarea::make('parent_address')
                    ->label('Alamat Orang Tua')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('nominal_income')
                    ->label('Penghasilan (Nominal)')
                    ->required()
                    ->numeric(),
                TextInput::make('number_depandent')
                    ->label('Jumlah Tanggungan')
                    ->required()
                    ->numeric(),
                TextInput::make('used_for')
                    ->label('Digunakan Untuk')
                    ->required(),
                TextInput::make('code')
                    ->label('Kode')
                    ->required(),
                Select::make('confirmation_status')
                    ->label('Status Konfirmasi')
                    ->options(CertificateStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}

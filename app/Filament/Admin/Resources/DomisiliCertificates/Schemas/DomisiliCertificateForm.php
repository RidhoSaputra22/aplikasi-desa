<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DomisiliCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('attachment')
                    ->label('Lampiran')
                    ->disk('local')
                    ->directory('attachments/')
                    ->columnSpanFull()
                    ->openable(),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('id_card_number')
                    ->label('Nomor KTP')
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
                    ->label('Agama')
                    ->options([
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Hindu' => 'Hindu',
                        'Buddha' => 'Buddha',
                        'Konghucu' => 'Konghucu',
                    ])
                    ->required(),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                TextInput::make('profession')
                    ->label('Pekerjaan')
                    ->required(),
                TextInput::make('neighbourhood')
                    ->label('RT')
                    ->required(),
                TextInput::make('hamlet')
                    ->label('RW')
                    ->required(),
                TextInput::make('village')
                    ->label('Desa/Kelurahan')
                    ->required(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
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

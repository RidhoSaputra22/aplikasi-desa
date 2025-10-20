<?php

namespace App\Filament\Admin\Resources\UsahaCertificates\Schemas;

use Filament\Schemas\Schema;
use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class UsahaCertificateForm
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
                TextInput::make('no_hp')
                    ->label('No. HP')
                    ->required(),
                TextInput::make('id_card_number')
                    ->label('Nomor KTP')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->label('Tanggal Lahir (Hari)')
                    ->required(),
                TextInput::make('month_of_birth')
                    ->label('Tanggal Lahir (Bulan)')
                    ->required(),
                TextInput::make('year_of_birth')
                    ->label('Tanggal Lahir (Tahun)')
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
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                    ->required(),
                TextInput::make('profession')
                    ->label('Pekerjaan')
                    ->required(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('business_type')
                    ->label('Jenis Usaha')
                    ->required(),
                TextInput::make('nama_usaha')
                    ->label('Nama Usaha')
                    ->required(),
                TextInput::make('bussiness_address')
                    ->label('Alamat Usaha')
                    ->required(),
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

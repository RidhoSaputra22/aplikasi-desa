<?php

namespace App\Filament\Admin\Resources\BirthCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BirthCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('baby_name')
                    ->label('Nama Bayi')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->label('Hari Kelahiran')
                    ->required(),
                TextInput::make('month_of_birth')
                    ->label('Bulan Kelahiran')
                    ->required(),
                TextInput::make('year_of_birth')
                    ->label('Tahun Kelahiran')
                    ->required(),
                TextInput::make('hour_of_birth')
                    ->label('Jam Kelahiran')
                    ->required(),
                TextInput::make('minute_of_birth')
                    ->label('Menit Kelahiran')
                    ->required(),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                TextInput::make('mother_name')
                    ->label('Status Konfirmasi')
                    ->required(),
                TextInput::make('mother_id_card_number')
                    ->label('Nomor KTP Ibu')
                    ->required(),
                TextInput::make('mother_age')
                    ->label('Umur Ibu')
                    ->required()
                    ->numeric(),
                TextInput::make('mother_profession')
                    ->label('Pekerjaan Ibu')
                    ->required(),
                Textarea::make('mother_address')
                    ->label('Alamat Ibu')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('father_name')
                    ->label('Nama Ayah')
                    ->required(),
                TextInput::make('father_id_card_number')
                    ->label('Nomor KTP Ayah')
                    ->required(),
                TextInput::make('father_age')
                    ->label('Umur Ayah')
                    ->required()
                    ->numeric(),
                TextInput::make('father_profession')
                    ->label('Pekerjaan Ayah')
                    ->required(),
                Textarea::make('father_address')
                    ->label('Alamat Ayah')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('reporter_name')
                    ->label('Nama Pelapor')
                    ->required(),
                TextInput::make('reporter_id_card_number')
                    ->label('Nomor KTP Pelapor')
                    ->required(),
                TextInput::make('reporter_age')
                    ->label('Umur Pelapor')
                    ->required()
                    ->numeric(),
                TextInput::make('reporter_profession')
                    ->label('Pekerjaan Pelapor')
                    ->required(),
                Textarea::make('reporter_address')
                    ->label('Alamat Pelapor')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('code')
                    ->label('Kode Surat')
                    ->required(),
                Select::make('confirmation_status')
                    ->options(CertificateStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DeathCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_surat')
                    ->label('Nomor Surat')
                    ->required(),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->label('Tempat Lahir')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->label('Hari Lahir')
                    ->required()
                    ->numeric(),
                TextInput::make('month_of_birth')
                    ->label('Bulan Lahir')
                    ->required()
                    ->numeric(),
                TextInput::make('year_of_birth')
                    ->label('Tahun Lahir')
                    ->required()
                    ->numeric(),
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
                TextInput::make('profession')
                    ->label('Pekerjaan')
                    ->required(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('place_of_death')
                    ->label('Tempat Meninggal')
                    ->required(),
                TextInput::make('day_of_death')
                    ->label('Hari Meninggal')
                    ->required()
                    ->numeric(),
                TextInput::make('month_of_death')
                    ->label('Bulan Meninggal')
                    ->required()
                    ->numeric(),
                TextInput::make('year_of_death')
                    ->label('Tahun Meninggal')
                    ->required()
                    ->numeric(),
                TextInput::make('cause_of_death')
                    ->label('Penyebab Kematian')
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

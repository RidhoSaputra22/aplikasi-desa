<?php

namespace App\Filament\Admin\Resources\DataPenduduks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DataPendudukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_kk')
                    ->required(),
                TextInput::make('nik')
                    ->required(),
                TextInput::make('nama_lengkap')
                    ->required(),
                Select::make('jenis_kelamin')
                    ->options(['Laki-laki' => 'Laki laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                DatePicker::make('tanggal_lahir')
                    ->required(),
                TextInput::make('hubungan_keluarga')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                TextInput::make('agama'),
                TextInput::make('pendidikan'),
                TextInput::make('pekerjaan'),
                Select::make('jenis_bantuan')
                    ->options([
                        'BPNT' => 'BPNT',
                        'PKH' => 'PKH',
                        'SEMBAKO' => 'SEMBAKO',
                        'KIP' => 'KIP',
                        'BEDAH_RUMAH' => 'BEDAH_RUMAH',
                        'BANTUAN_WC' => 'BANTUAN_WC',
                    ]),
                TextInput::make('penghasilan_bulanan'),
                Select::make('kategori_kemiskinan')
                    ->options([
                        'rentan' => 'Rentan Miskin',
                        'miskin' => 'Miskin',
                        'extrim' => 'Miskin Ekstrim',
                    ]),
            ]);
    }
}

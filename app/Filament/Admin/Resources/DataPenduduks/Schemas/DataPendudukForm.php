<?php

namespace App\Filament\Admin\Resources\DataPenduduks\Schemas;

use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

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
                    ->options(['L' => 'Laki laki', 'P' => 'Perempuan'])
                    ->required(),
                DatePicker::make('tanggal_lahir')
                    ->columnSpan(2)
                    ->required(),
                Flex::make([
                    Section::make([
                        Select::make('status_keluarga_id')
                            ->relationship('statusKeluarga', 'nama_status')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_status_keluarga')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('status_keluarga')->label('Tambah status keluarga'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\StatusKeluarga::create([
                                    'nama_status' => $data['status_keluarga'],
                                ]);

                                $set('status_keluarga_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(1),
                Flex::make([
                    Section::make([
                        Select::make('status_kawin_id')
                            ->relationship('statusKawin', 'nama_status')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_status_kawin')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('status_kawin')->label('Tambah status kawin'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\StatusKawin::create([
                                    'nama_status' => $data['status_kawin'],
                                ]);

                                $set('status_kawin_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(2),
                Flex::make([
                    Section::make([
                        Select::make('agama_id')
                            ->relationship('agama', 'nama_agama')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_agama')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('agama')->label('Tambah agama'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\Agama::create([
                                    'nama_agama' => $data['agama'],
                                ]);

                                $set('agama_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(2),
                Flex::make([
                    Section::make([
                        Select::make('pendidikan_id')
                            ->relationship('pendidikan', 'nama_pendidikan')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_pendidikan')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('pendidikan')->label('Tambah pendidikan'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\Pendidikan::create([
                                    'nama_pendidikan' => $data['pendidikan'],
                                ]);

                                $set('pendidikan_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(1),
                Flex::make([
                    Section::make([
                        Select::make('pekerjaan_id')
                            ->relationship('pekerjaan', 'nama_pekerjaan')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_pekerjaan')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('pekerjaan')->label('Tambah pekerjaan'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\Pekerjaan::create([
                                    'nama_pekerjaan' => $data['pekerjaan'],
                                ]);

                                $set('pekerjaan_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(1),
                Flex::make([
                    Section::make([
                        Select::make('jenis_bantuan_id')
                            ->relationship('jenisBantuan', 'nama_bantuan')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_jenis_bantuan')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('jenis_bantuan')->label('Tambah jenis bantuan'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\JenisBantuan::create([
                                    'nama_bantuan' => $data['jenis_bantuan'],
                                ]);

                                $set('jenis_bantuan_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(1),
                Flex::make([
                    Section::make([
                        Select::make('kategori_kemiskinan_id')
                            ->relationship('kategoriKemiskinan', 'nama_kategori')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Action::make('tambah_kategori_kemiskinan')
                            ->label('Lainnya')
                            ->modalHeading('Lainnya')
                            ->schema([
                                TextInput::make('kategori_kemiskinan')->label('Tambah kategori kemiskinan'),
                            ])->action(function ($data, Set $set, Get $get) {
                                $new = \App\Models\KategoriKemiskinan::create([
                                    'nama_kategori' => $data['kategori_kemiskinan'],
                                ]);

                                $set('kategori_kemiskinan_id', $new->id);
                            }),
                    ]),
                ])->columnSpan(1),


                TextInput::make('penghasilan_bulanan')->prefix('Rp ')->numeric()->columnSpan(2),
            ])->columns(3);
    }
}

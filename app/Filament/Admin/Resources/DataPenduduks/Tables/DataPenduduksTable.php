<?php

namespace App\Filament\Admin\Resources\DataPenduduks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataPenduduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_kk')
                    ->searchable(),
                TextColumn::make('nik')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->badge(),
                TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('statusKeluarga.nama_status')
                    ->searchable(),
                TextColumn::make('statusKawin.nama_status')
                    ->searchable(),
                TextColumn::make('agama.nama_agama')
                    ->searchable(),
                TextColumn::make('pendidikan.nama_pendidikan')
                    ->searchable(),
                TextColumn::make('pekerjaan.nama_pekerjaan')
                    ->searchable(),
                TextColumn::make('jenisBantuan.nama_bantuan')
                    ->searchable(),
                TextColumn::make('penghasilan_bulanan')
                    ->searchable(),
                TextColumn::make('kategoriKemiskinan.nama_kategori')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

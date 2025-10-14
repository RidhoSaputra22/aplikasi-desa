<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SaranaPrasaranasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_sarana')
                    ->searchable(),
                TextColumn::make('jenis_sarana')
                    ->searchable(),
                TextColumn::make('kondisi_sarana')
                    ->searchable(),
                TextColumn::make('kapasitas_sarana')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lokasi_sarana')
                    ->searchable(),
                ImageColumn::make('foto_sarana')
                    ->disk('public')
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

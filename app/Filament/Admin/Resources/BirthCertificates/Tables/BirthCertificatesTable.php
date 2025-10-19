<?php

namespace App\Filament\Admin\Resources\BirthCertificates\Tables;

use Filament\Tables\Table;
use App\Enums\CertificateStatus;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class BirthCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('baby_name')
                    ->label('Nama bayi')
                    ->searchable(),
                TextColumn::make('code')
                    ->label('Kode Surat')
                    ->searchable(),
                SelectColumn::make('confirmation_status')
                    ->label('Status Konfirmasi')
                    ->options(CertificateStatus::class)
                    ->sortable()
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

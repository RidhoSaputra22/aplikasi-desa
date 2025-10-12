<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DomisiliCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('id_card_number')
                    ->searchable(),
                TextColumn::make('place_of_birth')
                    ->searchable(),
                TextColumn::make('day_of_birth')
                    ->searchable(),
                TextColumn::make('month_of_birth')
                    ->searchable(),
                TextColumn::make('year_of_birth')
                    ->searchable(),
                TextColumn::make('religion')
                    ->searchable(),
                TextColumn::make('gender')
                    ->badge(),
                TextColumn::make('profession')
                    ->searchable(),
                TextColumn::make('neighbourhood')
                    ->searchable(),
                TextColumn::make('hamlet')
                    ->searchable(),
                TextColumn::make('village')
                    ->searchable(),
                TextColumn::make('attachment')
                    ->searchable(),
                TextColumn::make('code')
                    ->searchable(),
                TextColumn::make('confirmation_status')
                    ->badge(),
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

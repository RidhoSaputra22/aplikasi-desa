<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeathCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('place_of_birth')
                    ->searchable(),
                TextColumn::make('day_of_birth')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('month_of_birth')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('year_of_birth')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('religion')
                    ->searchable(),
                TextColumn::make('profession')
                    ->searchable(),
                TextColumn::make('place_of_death')
                    ->searchable(),
                TextColumn::make('day_of_death')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('month_of_death')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('year_of_death')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cause_of_death')
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

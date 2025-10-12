<?php

namespace App\Filament\Admin\Resources\BirthCertificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BirthCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('baby_name')
                    ->searchable(),
                TextColumn::make('place_of_birth')
                    ->searchable(),
                TextColumn::make('day_of_birth')
                    ->searchable(),
                TextColumn::make('month_of_birth')
                    ->searchable(),
                TextColumn::make('year_of_birth')
                    ->searchable(),
                TextColumn::make('hour_of_birth')
                    ->searchable(),
                TextColumn::make('minute_of_birth')
                    ->searchable(),
                TextColumn::make('gender')
                    ->badge(),
                TextColumn::make('mother_name')
                    ->searchable(),
                TextColumn::make('mother_id_card_number')
                    ->searchable(),
                TextColumn::make('mother_age')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('mother_profession')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('father_id_card_number')
                    ->searchable(),
                TextColumn::make('father_age')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('father_profession')
                    ->searchable(),
                TextColumn::make('reporter_name')
                    ->searchable(),
                TextColumn::make('reporter_id_card_number')
                    ->searchable(),
                TextColumn::make('reporter_age')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('reporter_profession')
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

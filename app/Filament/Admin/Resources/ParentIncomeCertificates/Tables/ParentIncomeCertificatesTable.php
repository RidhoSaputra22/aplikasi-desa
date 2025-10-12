<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParentIncomeCertificatesTable
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
                    ->searchable(),
                TextColumn::make('month_of_birth')
                    ->searchable(),
                TextColumn::make('year_of_birth')
                    ->searchable(),
                TextColumn::make('religion')
                    ->searchable(),
                TextColumn::make('profession')
                    ->searchable(),
                TextColumn::make('parent_name')
                    ->searchable(),
                TextColumn::make('parent_place_of_birth')
                    ->searchable(),
                TextColumn::make('parent_day_of_birth')
                    ->searchable(),
                TextColumn::make('parent_month_of_birth')
                    ->searchable(),
                TextColumn::make('parent_year_of_birth')
                    ->searchable(),
                TextColumn::make('parent_religion')
                    ->searchable(),
                TextColumn::make('parent_profession')
                    ->searchable(),
                TextColumn::make('nominal_income')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_depandent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('used_for')
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

<?php

namespace App\Filament\Admin\Resources\ParawisataDesas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;

class ParawisataDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
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
                SelectFilter::make('title')
                    ->label('Judul')
                    ->options(fn() => [])
                    ->placeholder('Semua Judul'),

                Filter::make('created_from')
                    ->schema([
                        DatePicker::make('created_from')->label('Dari Tanggal'),
                    ])
                    ->query(fn($query, $data) => empty($data['created_from']) ? $query : $query->whereDate('created_at', '>=', $data['created_from']))
                    ->label('Dari Tanggal'),

                Filter::make('created_until')
                    ->schema([
                        DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(fn($query, $data) => empty($data['created_until']) ? $query : $query->whereDate('created_at', '<=', $data['created_until']))
                    ->label('Sampai Tanggal'),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
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

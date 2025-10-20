<?php

namespace App\Filament\Admin\Resources\BeritaDesas\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;

class BeritaDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->label('Gambar')
                    ->width(50),
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
                Filter::make('created_from')
                    ->schema([
                        DatePicker::make('created_from')
                            ->label('Dibuat Dari Tanggal'),
                    ])
                    ->query(function ($query, $data) {
                        if (empty($data['created_from'])) return $query;

                        return $query->whereDate('created_at', '>=', $data['created_from']);
                    })
                    ->label('Dari Tanggal'),

                Filter::make('created_until')
                    ->schema([
                        DatePicker::make('created_until')
                            ->label('Dibuat Sampai Tanggal'),
                    ])
                    ->query(function ($query, $data) {
                        if (empty($data['created_until'])) return $query;

                        return $query->whereDate('created_at', '<=', $data['created_until']);
                    })
                    ->label('Sampai Tanggal'),
            ],  layout: FiltersLayout::AboveContent)->filtersFormColumns(3)
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

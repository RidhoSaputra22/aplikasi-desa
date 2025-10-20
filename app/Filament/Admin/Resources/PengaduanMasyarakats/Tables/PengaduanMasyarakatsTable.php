<?php

namespace App\Filament\Admin\Resources\PengaduanMasyarakats\Tables;

use Filament\Tables\Table;
use App\Enums\PengaduanStatus;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class PengaduanMasyarakatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('no_hp')
                    ->searchable(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('code')
                    ->searchable(),
                SelectColumn::make('confirmation_status')
                    ->options(PengaduanStatus::options()),
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
                SelectFilter::make('confirmation_status')
                    ->label('Status')
                    ->options(PengaduanStatus::options())
                    ->placeholder('Semua Status'),

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

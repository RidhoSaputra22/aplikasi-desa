<?php

namespace App\Filament\Admin\Resources\UmkmDesas\Tables;

use Filament\Tables\Table;
use App\Enums\CertificateStatus;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class UmkmDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->searchable(),
                TextColumn::make('no_hp')
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
                TernaryFilter::make('harga')
                    ->label('Harga Produk')
                    ->trueLabel('Di atas 100.000')
                    ->falseLabel('Di bawah atau sama dengan 100.000')
                    ->queries(
                        true: fn($query) => $query->where('harga', '>', 100000),
                        false: fn($query) => $query->where('harga', '<=', 100000),
                    ),
                SelectFilter::make('kategoriUmkm')
                    ->label('Kategori Produk')
                    ->relationship('kategoriUmkm', 'nama_kategori')
                    ->placeholder('Semua Produk'),
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

            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4)
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

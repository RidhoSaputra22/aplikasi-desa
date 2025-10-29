<?php

namespace App\Filament\Admin\Resources\DataPenduduks\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Enums\CertificateStatus;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;

class DataPenduduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nop')
                    ->label('NOP')
                    ->searchable(),
                TextColumn::make('no_surat')
                    ->label('No Surat')
                    ->searchable(),
                TextColumn::make('no_kk')
                    ->searchable(),
                TextColumn::make('nik')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
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
                SelectFilter::make('confirmation_status')
                    ->label('Status Konfirmasi')
                    ->options(CertificateStatus::options())
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
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->recordActions([
                EditAction::make(),
                Action::make('view')
                    ->label('Lihat Surat')
                    ->url(fn($record) => route('surat-online.surat-bantuan', $record->nik))
                    ->openUrlInNewTab()
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                Action::make('confirm')
                    ->label('Konfirmasi')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->disabled(fn($record) => $record->confirmation_status === CertificateStatus::SUCCESS)
                    ->modalHeading('Konfirmasi Surat ')
                    ->modalDescription('Pastikan data sudah benar sebelum melakukan konfirmasi surat ini.')
                    ->schema([
                        TextInput::make('no_surat')
                            ->label('No Surat')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required(),
                    ])
                    ->action(function ($data, $record) {
                        // Action logic to confirm the certificate
                        $record->update([
                            'confirmation_status' => CertificateStatus::SUCCESS,
                            'no_surat' => $data['no_surat'],
                        ]);
                    }),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

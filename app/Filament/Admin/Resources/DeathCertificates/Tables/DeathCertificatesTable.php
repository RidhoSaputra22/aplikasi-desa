<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Enums\CertificateType;
use App\Enums\CertificateStatus;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;

class DeathCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_surat')
                    ->label('Nomor Surat')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nama almarhum/almarhumah')
                    ->searchable(),
                TextColumn::make('code')
                    ->label('Kode Surat')
                    ->searchable(),
                TextColumn::make('confirmation_status')
                    ->label('Status Konfirmasi')
                    ->badge()
                    ->colors([
                        'warning' => CertificateStatus::PENDING,
                        'info' => CertificateStatus::CONFIRM,
                        'success' => CertificateStatus::SUCCESS,
                    ])
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
                    ->url(fn($record) => route('surat-online.lihat', ['jenis' => CertificateType::KEMATIAN, 'code' => $record->code]))
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

<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Enums\CertificateType;
use App\Enums\CertificateStatus;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\SelectColumn;

class DomisiliCertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('code')
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
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('view')
                    ->label('Lihat Surat')
                    ->url(fn($record) => route('surat-online.lihat', ['jenis' => CertificateType::DOMISILI, 'code' => $record->code]))
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

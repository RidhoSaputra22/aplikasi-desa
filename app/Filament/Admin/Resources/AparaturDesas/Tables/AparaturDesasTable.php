<?php

namespace App\Filament\Admin\Resources\AparaturDesas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AparaturDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('jabatan')
                    ->searchable(),
                ImageColumn::make('foto'),
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
                    DeleteBulkAction::make()
                        ->action(function (\Illuminate\Support\Collection $records) {
                            $toDelete = $records->reject(fn($record) => $record->jabatan === 'Kepala Lurah');
                            $skipped = $records->count() - $toDelete->count();

                            $toDelete->each->delete();

                            if ($skipped > 0) {
                                \Filament\Notifications\Notification::make()
                                    ->warning("{$skipped} item(s) tidak dihapus karena jabatan 'Kepala Lurah'.")
                                    ->send();
                            }
                        }),
                ]),
            ]);
    }
}

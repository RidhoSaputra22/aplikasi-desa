<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Artisan;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Concerns\InteractsWithSchemas;

class Setting extends Page
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.pages.setting';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static string|\UnitEnum|null $navigationGroup = 'Setting';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralModelLabel = 'Settings';
    protected static ?string $modelLabel = 'Settings';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Action::make('Migrate Database')
                    ->action('migrateDatabase')
                    ->color('success')
                    ->icon(Heroicon::OutlinedServer)
                    ->label('Migrate Database')
                    ->action(function () {
                        // Logic to migrate the database
                        Artisan::call('migrate', ['--force' => true]);
                        Notification::make()
                            ->title('Database migrated successfully.')
                            ->success()
                            ->send();
                    }),
                Action::make('Composer Update')
                    ->action('composerUpdate')
                    ->color('primary')
                    ->icon(Heroicon::OutlinedArrowPath)
                    ->label('Composer Update')
                    ->action(function () {
                        // Logic to run composer update
                        Artisan::call('composer:update');
                        Notification::make()
                            ->title('Composer packages updated successfully.')
                            ->success()
                            ->send();
                    }),

            ])
            ->columns(3)
            ->statePath('data');
    }
}

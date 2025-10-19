<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Artisan;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Flex;
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
                Section::make('Database')
                    ->description('Update composer packages dari dalam aplikasi.')
                    ->columnSpanFull()
                    ->schema([
                        Flex::make([
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
                            Action::make('Update Composer Packages')
                                ->action('updateComposerPackages')
                                ->color('primary')
                                ->icon(Heroicon::OutlinedArrowPath)
                                ->label('Update Composer Packages')
                                ->action(function () {
                                    // Logic to run composer update
                                    $output = [];
                                    $returnVar = null;
                                    exec('cd ' . base_path() . ' && composer update 2>&1', $output, $returnVar);

                                    if ($returnVar === 0) {
                                        Notification::make()
                                            ->title('Composer packages updated successfully.')
                                            ->body(implode("\n", $output))
                                            ->success()
                                            ->send();
                                    } else {
                                        Notification::make()
                                            ->title('Failed to update composer packages.')
                                            ->body(implode("\n", $output))
                                            ->danger()
                                            ->send();
                                    }
                                }),
                        ])
                    ]),
                Section::make('Web Optimizer')
                    ->description('Optimasi aplikasi untuk kinerja yang lebih baik.')
                    ->columnSpanFull()
                    ->schema([
                        Flex::make([
                            Action::make('Optimize Application')
                                ->action('optimizeApplication')
                                ->color('primary')
                                ->icon(Heroicon::OutlinedSparkles)
                                ->label('Optimize Application')
                                ->action(function () {
                                    // Logic to optimize the application
                                    Artisan::call('optimize');
                                    Notification::make()
                                        ->title('Application optimized successfully.')
                                        ->success()
                                        ->send();
                                }),
                            Action::make('Clear Cache')
                                ->action('clearCache')
                                ->color('warning')
                                ->icon(Heroicon::OutlinedTrash)
                                ->label('Clear Cache')
                                ->action(function () {
                                    // Logic to clear the cache
                                    Artisan::call('cache:clear');
                                    Notification::make()
                                        ->title('Cache cleared successfully.')
                                        ->success()
                                        ->send();
                                }),
                            Action::make('Clear Image Cache')
                                ->action('clearImageCache')
                                ->color('warning')
                                ->icon(Heroicon::OutlinedTrash)
                                ->label('Clear Image Cache')
                                ->action(function () {
                                    // Logic to clear the cache
                                    Artisan::call('app:clear-cache');
                                    Notification::make()
                                        ->title('Cache cleared successfully.')
                                        ->success()
                                        ->send();
                                }),
                        ])

                    ]),
            ])
            ->columns(3)
            ->statePath('data');
    }
}

<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use App\Models\FileManagement;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\Flex;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Tables\Table; // Import the Table class
use Filament\Tables\Columns\TextColumn; // Import the column types you need


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
                            Action::make('Backup Database')
                                ->color('primary')
                                ->icon(Heroicon::OutlinedServerStack)
                                ->label('Backup Database')
                                ->action(function () {
                                    Artisan::call('app:backup-databases', [
                                        '--connection' => null, // default connection
                                    ]);
                                    Notification::make()
                                        ->title('Database backup completed successfully.')
                                        ->success()
                                        ->send();
                                }),
                            Action::make('Download Backup Terakhir')
                                ->color('primary')
                                ->icon(Heroicon::OutlinedArrowDown)
                                ->label('Download Backup Terakhir')
                                ->action(function () {
                                    $disk = Storage::disk('local');
                                    // Try the directory where backups are written by the command
                                    $dirsToCheck = ['private/backups', 'backups'];

                                    $files = [];
                                    foreach ($dirsToCheck as $dir) {
                                        $found = $disk->files($dir);
                                        if (!empty($found)) {
                                            $files = array_merge($files, $found);
                                        }
                                    }

                                    if (empty($files)) {
                                        Notification::make()
                                            ->title('No backup files found.')
                                            ->danger()
                                            ->send();
                                        return null;
                                    }

                                    // pick the most recently modified file
                                    $latest = collect($files)->sortByDesc(function ($file) use ($disk) {
                                        return $disk->lastModified($file);
                                    })->first();

                                    if (!$disk->exists($latest)) {
                                        Notification::make()
                                            ->title('Backup file not found on disk.')
                                            ->danger()
                                            ->send();
                                        return null;
                                    }

                                    // Stream the file to the response to support older Laravel versions
                                    $stream = $disk->readStream($latest);
                                    if ($stream === false) {
                                        Notification::make()
                                            ->title('Failed to read backup file.')
                                            ->danger()
                                            ->send();
                                        return null;
                                    }

                                    $basename = basename($latest);
                                    return response()->streamDownload(function () use ($stream) {
                                        fpassthru($stream);
                                    }, $basename);
                                }),

                        ])
                    ]),
            ])
            ->columns(3)
            ->statePath('data');
    }
}

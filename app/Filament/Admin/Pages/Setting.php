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


class Setting extends Page implements HasTable
{
    use InteractsWithSchemas, InteractsWithTable;


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
                Section::make('Web Optimizer')
                    ->description('Optimasi aplikasi untuk kinerja yang lebih baik.')
                    ->columnSpanFull()
                    ->schema([
                        Flex::make([

                            Action::make('Link Storage')
                                ->color('success')
                                ->icon(Heroicon::OutlinedTrash)
                                ->label('Clear Cache')
                                ->action(function () {
                                    // Logic to clear the cache
                                    Artisan::call('storage:link');
                                    Notification::make()
                                        ->title('Storage linked successfully.')
                                        ->success()
                                        ->send();
                                }),
                            Action::make('Clear Cache')
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
                            Action::make('Clear View Cache')
                                ->color('warning')
                                ->icon(Heroicon::OutlinedTrash)
                                ->label('Clear View Cache')
                                ->action(function () {
                                    // Logic to clear the view cache
                                    Artisan::call('view:clear');
                                    Notification::make()
                                        ->title('View cache cleared successfully.')
                                        ->success()
                                        ->send();
                                }),

                        ])

                    ]),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                FileManagement::where('mime_type', 'like', 'image/%')
            )
            ->heading('Tabel Gambar')
            ->columns([
                TextColumn::make('filename')
                    ->label('Nama File')
                    ->wrap()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }

                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    })
                    ->lineClamp(4)
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nama file tersalin')
                    ->copyMessageDuration(1500),
                TextColumn::make('disk')
                    ->label('Disk')
                    ->searchable(),
                TextColumn::make('mime_type')
                    ->label('Tipe MIME')
                    ->searchable(),
                TextColumn::make('size')
                    ->label('Ukuran')
                    ->formatStateUsing(fn($state) => $state ? round($state / 1024, 2) : 0)
                    ->suffix(' KB')
                    ->searchable(),
                ImageColumn::make('path')
                    ->disk(fn($record) => $record->disk)
                    ->label('Foto'),
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
                TernaryFilter::make('Ukuran File')
                    ->label('Ukuran File')
                    ->trueLabel('Diatas 1 MB')
                    ->falseLabel('Dibawah 1 MB')
                    ->queries(
                        true: fn($query) => $query->where('size', '>', 1024 * 1024),
                        false: fn($query) => $query->where('size', '<=', 1024 * 1024),
                    ),

                SelectFilter::make('disk')
                    ->label('Disk')
                    ->options(function () {
                        return FileManagement::query()
                            ->distinct()
                            ->pluck('disk', 'disk')
                            ->toArray();
                    }),



            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->recordActions([
                Action::make('Optimize Image')
                    ->color('success')
                    ->icon(Heroicon::OutlinedPhoto)
                    ->label('Optimasi Gambar')
                    ->modalHeading('Optimasi Gambar')
                    ->modalDescription('Optimasi gambar untuk mengurangi ukuran file tanpa mengorbankan kualitas.')
                    ->schema([
                        TextInput::make('quality')
                            ->label('Kualitas (1-100)')
                            ->type('number')
                            ->minValue(1)
                            ->maxValue(100)
                            ->default(85)
                            ->required(),
                    ])
                    ->action(function (FileManagement $record, array $data) {
                        $quality = $data['quality'] ?? 85;

                        // Call the image resizer command for this single file
                        Artisan::call('app:image-resizer', [
                            '--threshold' => 10,
                            '--file' => $record->path,
                            '--quality' => $quality,
                        ]);

                        Notification::make()
                            ->title('Gambar dioptimasi dengan kualitas ' . $quality . '.')
                            ->success()
                            ->send();
                    }),
                EditAction::make('Lihat Gambar')
                    ->label('Lihat')
                    ->modalWidth('7xl')
                    ->modalHeading('Lihat Gambar')
                    ->color('primary')
                    ->icon(Heroicon::OutlinedEye)
                    ->schema([
                        FileUpload::make('path')
                            ->label('Preview Gambar')
                            ->image()
                            ->disk(fn($record) => $record->disk)
                            ->disabled(true),
                    ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                ]),
                Action::make('Reload Data')
                    ->color('warning')
                    ->icon(Heroicon::OutlinedArrowPath)
                    ->label('Reload Data')
                    ->action(function () {
                        Artisan::call('app:find-files');
                        Notification::make()
                            ->title('File data reloaded successfully.')
                            ->success()
                            ->send();
                    }),
                Action::make('Optimize Images')
                    ->color('warning')

                    ->icon(Heroicon::OutlinedPhoto)
                    ->label('Optimize Images')
                    ->action(function () {
                        // Logic to optimize images
                        Artisan::call('app:image-resizer', [
                            '--threshold' => 500, // in KB
                            '--max-width' => 1920,
                            '--max-height' => 1080,
                            '--quality' => 85,
                        ]);

                        Notification::make()
                            ->title('Image optimization completed successfully.')
                            ->success()
                            ->send();
                    }),
                // Add more toolbar actions here

                Action::make('Clear Image Cache')
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
            ]);
    }
}

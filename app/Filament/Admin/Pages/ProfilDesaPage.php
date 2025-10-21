<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Models\ProfilDesa;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Flex;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Concerns\InteractsWithSchemas;

class ProfilDesaPage extends Page
{
    use InteractsWithSchemas;

    public ?array $data = [];
    protected string $view = 'filament.admin.pages.profil-desa';
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;
    protected static ?string $navigationLabel = 'Profile Desa';
    protected static ?string $pluralModelLabel = 'Profile Desa';
    protected static ?string $modelLabel = 'Profile Desa';



    public function mount(): void
    {
        $data = ProfilDesa::first();
        $this->data = $data ? $data->toArray() : [];
        $this->form->fill(
            $this->data
        );
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sub_judul')
                    ->columnSpanFull(),
                RichEditor::make('sejarah_desa')
                    ->columnSpanFull()
                    ->required(),
                RichEditor::make('visi')
                    ->columnSpanFull(),
                RichEditor::make('misi')
                    ->columnSpanFull(),

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

            ])
            ->columns(3)
            ->statePath('data');
    }

    public function submit(): void
    {
        // ModelsProfilDesa::create($this->form->getState());
        ProfilDesa::updateOrCreate([], $this->form->getState());
        Notification::make()
            ->title('Profil Desa berhasil disimpan.')
            ->success()
            ->send();
    }

    protected function getActionsButtons()
    {
        return Action::make('save')
            ->label('Save')
            ->action('submit')
            ->button();
    }
}
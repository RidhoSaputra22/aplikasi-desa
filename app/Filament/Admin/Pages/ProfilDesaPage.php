<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Models\ProfilDesa;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

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
    protected static ?string $navigationLabel = 'Profile Kelurahan';
    protected static ?string $pluralModelLabel = 'Profile Kelurahan';
    protected static ?string $modelLabel = 'Profile Kelurahan';



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

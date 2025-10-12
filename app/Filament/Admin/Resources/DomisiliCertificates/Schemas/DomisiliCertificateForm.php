<?php

namespace App\Filament\Admin\Resources\DomisiliCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DomisiliCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('id_card_number')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->required(),
                TextInput::make('month_of_birth')
                    ->required(),
                TextInput::make('year_of_birth')
                    ->required(),
                TextInput::make('religion')
                    ->required(),
                Select::make('gender')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                TextInput::make('profession')
                    ->required(),
                TextInput::make('neighbourhood')
                    ->required(),
                TextInput::make('hamlet')
                    ->required(),
                TextInput::make('village')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('attachment'),
                TextInput::make('code')
                    ->required(),
                Select::make('confirmation_status')
                    ->options(CertificateStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}

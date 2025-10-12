<?php

namespace App\Filament\Admin\Resources\DeathCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DeathCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->required()
                    ->numeric(),
                TextInput::make('month_of_birth')
                    ->required()
                    ->numeric(),
                TextInput::make('year_of_birth')
                    ->required()
                    ->numeric(),
                TextInput::make('religion')
                    ->required(),
                TextInput::make('profession')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('place_of_death')
                    ->required(),
                TextInput::make('day_of_death')
                    ->required()
                    ->numeric(),
                TextInput::make('month_of_death')
                    ->required()
                    ->numeric(),
                TextInput::make('year_of_death')
                    ->required()
                    ->numeric(),
                TextInput::make('cause_of_death')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                Select::make('confirmation_status')
                    ->options(CertificateStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}

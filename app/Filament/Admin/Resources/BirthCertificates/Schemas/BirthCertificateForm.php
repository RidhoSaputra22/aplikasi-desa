<?php

namespace App\Filament\Admin\Resources\BirthCertificates\Schemas;

use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BirthCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('baby_name')
                    ->required(),
                TextInput::make('place_of_birth')
                    ->required(),
                TextInput::make('day_of_birth')
                    ->required(),
                TextInput::make('month_of_birth')
                    ->required(),
                TextInput::make('year_of_birth')
                    ->required(),
                TextInput::make('hour_of_birth')
                    ->required(),
                TextInput::make('minute_of_birth')
                    ->required(),
                Select::make('gender')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                TextInput::make('mother_name')
                    ->required(),
                TextInput::make('mother_id_card_number')
                    ->required(),
                TextInput::make('mother_age')
                    ->required()
                    ->numeric(),
                TextInput::make('mother_profession')
                    ->required(),
                Textarea::make('mother_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('father_name')
                    ->required(),
                TextInput::make('father_id_card_number')
                    ->required(),
                TextInput::make('father_age')
                    ->required()
                    ->numeric(),
                TextInput::make('father_profession')
                    ->required(),
                Textarea::make('father_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('reporter_name')
                    ->required(),
                TextInput::make('reporter_id_card_number')
                    ->required(),
                TextInput::make('reporter_age')
                    ->required()
                    ->numeric(),
                TextInput::make('reporter_profession')
                    ->required(),
                Textarea::make('reporter_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('code')
                    ->required(),
                Select::make('confirmation_status')
                    ->options(CertificateStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}

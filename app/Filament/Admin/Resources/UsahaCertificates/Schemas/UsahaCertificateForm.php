<?php

namespace App\Filament\Admin\Resources\UsahaCertificates\Schemas;

use Filament\Schemas\Schema;
use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class UsahaCertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('attachment')
                    ->disk('local')
                    ->directory('attachments/')
                    ->columnSpanFull()
                    ->openable(),
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
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('business_type')
                    ->required(),
                TextInput::make('used_for')
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

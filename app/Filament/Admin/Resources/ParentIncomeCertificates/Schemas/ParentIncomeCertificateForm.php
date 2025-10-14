<?php

namespace App\Filament\Admin\Resources\ParentIncomeCertificates\Schemas;

use Filament\Schemas\Schema;
use App\Enums\CertificateStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ParentIncomeCertificateForm
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
                TextInput::make('profession')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('parent_name')
                    ->required(),
                TextInput::make('parent_place_of_birth')
                    ->required(),
                TextInput::make('parent_day_of_birth')
                    ->required(),
                TextInput::make('parent_month_of_birth')
                    ->required(),
                TextInput::make('parent_year_of_birth')
                    ->required(),
                TextInput::make('parent_religion')
                    ->required(),
                TextInput::make('parent_profession')
                    ->required(),
                Textarea::make('parent_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('nominal_income')
                    ->required()
                    ->numeric(),
                TextInput::make('number_depandent')
                    ->required()
                    ->numeric(),
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

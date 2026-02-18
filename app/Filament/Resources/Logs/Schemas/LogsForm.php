<?php

namespace App\Filament\Resources\Logs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LogsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('log_name')
                    ->label('Log Name')
                    ->required(),
                TextInput::make('description')
                    ->label('Log Description')
                    ->required(),
                TextInput::make('subject_type')
                    ->label('Subject Type')
                    ->required(),
                TextInput::make('subject_id')
                    ->label('Subject ID')
                    ->required(),

            ]);
    }
}

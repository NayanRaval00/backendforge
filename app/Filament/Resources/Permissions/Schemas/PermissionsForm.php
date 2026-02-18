<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class PermissionsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Permission Name')
                    ->required(),
                Select::make('guard_name')
                    ->label('Guard Name')
                    ->options([
                        'web' => 'Web',
                        'admin' => 'Admin',
                    ])
            ]);
    }
}

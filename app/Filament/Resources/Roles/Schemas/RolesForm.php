<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class RolesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Role Name')
                    ->required(),
                Select::make('guard_name')
                    ->label('Guard Name')
                    ->options([
                        'web' => 'Web',
                        'admin' => 'Admin',
                    ])
                    ->reactive() // 👈 important
                    ->required()
                    ->afterStateUpdated(fn(Set $set) => $set('permissions', [])), // reset permissions on change

                CheckboxList::make('permissions')
                    ->relationship(
                        name: 'permissions',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query, Get $get) {
                            if ($get('guard_name')) {
                                $query->where('guard_name', $get('guard_name'));
                            }
                        }
                    )
                    ->columns(2)
                    ->required(),
            ]);
    }
}

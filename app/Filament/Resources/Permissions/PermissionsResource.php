<?php

namespace App\Filament\Resources\Permissions;

use App\Filament\Resources\Permissions\Pages\CreatePermissions;
use App\Filament\Resources\Permissions\Pages\EditPermissions;
use App\Filament\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Resources\Permissions\Pages\ViewPermissions;
use App\Filament\Resources\Permissions\Schemas\PermissionsForm;
use App\Filament\Resources\Permissions\Schemas\PermissionsInfolist;
use App\Filament\Resources\Permissions\Tables\PermissionsTable;
use Spatie\Permission\Models\Permission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PermissionsResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Permissions';

    public static function form(Schema $schema): Schema
    {
        return PermissionsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PermissionsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermissions::route('/'),
            'create' => CreatePermissions::route('/create'),
            'view' => ViewPermissions::route('/{record}'),
            'edit' => EditPermissions::route('/{record}/edit'),
        ];
    }
}

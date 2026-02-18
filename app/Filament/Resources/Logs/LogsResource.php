<?php

namespace App\Filament\Resources\Logs;

use App\Filament\Resources\Logs\Pages\CreateLogs;
use App\Filament\Resources\Logs\Pages\ViewLogs;
use App\Filament\Resources\Logs\Pages\ListLogs;
use App\Filament\Resources\Logs\Schemas\LogsForm;
use App\Filament\Resources\Logs\Tables\LogsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;

class LogsResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Logs';

    public static function form(Schema $schema): Schema
    {
        return LogsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LogsTable::configure($table);
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
            'index' => ListLogs::route('/'),
            'view' => ViewLogs::route('/{record}'),

            // 'create' => CreateLogs::route('/create'),
            // 'edit' => EditLogs::route('/{record}/edit'),
        ];
    }
}

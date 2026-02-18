<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\Resources\Roles\RolesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRoles extends EditRecord
{
    protected static string $resource = RolesResource::class;
    protected ?string $deletedRole = null;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()->before(function () {
                $this->deletedRole = $this->record->roles->first()?->name;
            })
                ->after(function () {
                    activity()
                        ->performedOn($this->record)
                        ->causedBy(auth()->guard('admin')->user())
                        ->withProperties([
                            'role' => $this->deletedRole,
                        ])
                        ->log('Role deleted');
                }),
        ];
    }
}

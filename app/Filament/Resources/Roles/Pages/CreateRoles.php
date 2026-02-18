<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\Resources\Roles\RolesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRoles extends CreateRecord
{
    protected static string $resource = RolesResource::class;

    protected function afterCreate(): void
    {
        $this->record->syncRoles([$this->data['role']]);
        activity()
            ->performedOn($this->record)
            ->causedBy(auth()->guard('admin')->user())
            ->withProperties([
                'role' => $this->data['role'],
            ])
            ->log('Role created');
    }
}

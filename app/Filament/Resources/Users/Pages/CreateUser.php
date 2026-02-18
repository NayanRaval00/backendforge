<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected function afterCreate(): void
    {
        $this->record->syncRoles([$this->data['role']]);
        activity()
            ->performedOn($this->record)
            ->causedBy(auth()->guard('admin')->user())
            ->withProperties([
                'role' => $this->data['role'],
            ])
            ->log('User created');
    }
}

<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected ?string $deletedRole = null;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->before(function () {
                    $this->deletedRole = $this->record->roles->first()?->name;
                })
                ->after(function () {
                    activity()
                        ->performedOn($this->record)
                        ->causedBy(auth()->guard('admin')->user())
                        ->withProperties([
                            'role' => $this->deletedRole,
                        ])
                        ->log('User deleted');
                }),

        ];
    }

    protected function afterSave(): void
    {
        $this->record->assignRole([$this->data['role']]);
    }
}

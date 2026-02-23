<?php

use App\Events\TestRealtimeEvent;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test-notification', function () {
//     $user = App\Models\User::first();
//     $user->notify(new App\Notifications\NewUserCreated($user));
//     return 'Notification sent';
// });


Route::get('/test-notification', function () {
    $newUser = \App\Models\User::latest()->first();

    $admin = \App\Models\Admin::first();

    Notification::make()
        ->title('New User Registered')
        ->body("{$newUser->name} just signed up.")
        ->icon('heroicon-o-user-plus')
        ->success()
        ->send()                // 🍞 TOAST popup
        ->sendToDatabase($admin); // 🔔 Bell notification
    // $admin->notify(new \App\Notifications\NewUserCreated($newUser));

    return 'Notification sent';
});


Route::get('/fire-test-event', function () {
    Notification::make()
        ->title('Saved successfully')
        ->success()
        ->send();
    // broadcast(new TestRealtimeEvent('Realtime is WORKING 🚀'));
    return 'Event fired';
});

Route::get('/test-realtime', function () {
    return view('test-realtime');
});

<?php

use App\Livewire\User\DeleteUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\UserMainComponent;
use Illuminate\Support\Facades\Route;

Route::get('/user', UserMainComponent::class)->name('user.index');
Route::get('/users/{id}/delete', DeleteUser::class)->name('users.delete');
Route::get('/users/{id}/edit', EditUser::class)->name('users.edit');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

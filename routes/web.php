<?php

use App\Livewire\Plan\CreatePlan;
use App\Livewire\Plan\DeletePlan;
use App\Livewire\Plan\Details\DeleteDetailsPlan;
use App\Livewire\Plan\Details\DetailsPlanos;
use App\Livewire\Plan\Details\EditDetailsPlan;
use App\Livewire\Plan\Details\MainComponentDetailsPlan;
use App\Livewire\Plan\EditPlan;
use App\Livewire\Plan\PlanMainComponent;
use App\Livewire\User\DeleteUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\UserMainComponent;
use Illuminate\Support\Facades\Route;

//Routes Details Plan
Route::get('/details/{id}', MainComponentDetailsPlan::class)->name('details.index');
Route::get('/detailsPlan', DetailsPlanos::class)->name('detailsPlan.index');
Route::get('/detailsPlan/{id}/delete', DeleteDetailsPlan::class)->name('detailsPlan.delete');
Route::get('/detailsPlan/{id}/edit', EditDetailsPlan::class)->name('detailsPlan.edit');
//Fim Routes Details Plan

//Routes Plans
Route::get('/plan', PlanMainComponent::class)->name('plan.index');
Route::get('/plans/{id}/delete', DeletePlan::class)->name('plans.delete');
Route::get('/plans/{id}/edit', EditPlan::class)->name('plans.edit');
Route::get('/plans/{id}/edit', CreatePlan::class)->name('plans.edit');
//Fim Routes Plans

//Routes Users
Route::get('/user', UserMainComponent::class)->name('user.index');
Route::get('/users/{id}/delete', DeleteUser::class)->name('users.delete');
Route::get('/users/{id}/edit', EditUser::class)->name('users.edit');
//Fim Routes Users

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

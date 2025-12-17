<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified' ])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    
    Route::get('/users', [UserController::class, 'allUsers'])->name('users');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
    
    Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post');
    Route::get('/post/add', [\App\Http\Controllers\PostController::class, 'add'])->name('post.add');
    Route::post('/post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    
    Route::get('/post/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::get('/post/{id}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
});

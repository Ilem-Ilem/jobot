<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
use App\Livewire\Project\Wizard;

Route::get('/project/create', Wizard::class)
    ->middleware(['auth'])
    ->name('project.create');

require __DIR__.'/admin.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Projects;

Route::prefix('admin')->middleware(['web', 'auth', 'admin'])->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/projects', Projects::class)->name('admin.projects');
});

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['web', 'auth', 'admin'])->group(function () {
    // Admin routes will go here
});

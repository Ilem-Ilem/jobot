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

use App\Livewire\Chapter\Writer;

Route::get('/chapter/{chapter}', Writer::class)
    ->middleware(['auth'])
    ->name('chapter.writer');

use App\Http\Controllers\ProjectExportController;

Route::get('/project/{project}/export', [ProjectExportController::class, 'export'])
    ->middleware(['auth'])
    ->name('project.export');

use App\Livewire\TopicSuggester;

Route::get('/topic-suggester', TopicSuggester::class)
    ->middleware(['auth'])
    ->name('topic-suggester');

Route::get('/project/{project}/export-pptx', [ProjectExportController::class, 'exportPptx'])
    ->middleware(['auth'])
    ->name('project.export-pptx');

require __DIR__.'/admin.php';

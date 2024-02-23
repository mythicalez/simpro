<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubProjectController;
use App\Http\Controllers\EngineeringController;

// Route::resource('dashboard', DashboardController::class)->names([
//     'index' => 'dashboard'
// ]);

// Route::resource('project', ProjectController::class)->names([
//     'index' => 'project'
// ]);

// Route::get('/', [IndexController::class, 'index'])->name('index');
// Route::get('/about', [IndexController::class, 'about'])->name('about');

// Route::resource('dashboard', DashboardController::class)->names([
//     'index' => 'dashboard'
// ]);

// Route::resource('project', ProjectController::class)->names([
//     'index' => 'project'
// ]);

// Route::resource('subproject', SubProjectController::class)->names([
//     'index' => 'subproject'
// ]);

// Route::put('/project/{id}/nonactive', [ProjectController::class, 'nonactive'])->name('project.nonactive');

// Route::resource('phase', PhaseController::class)->names([
//     'index' => 'phase'
// ]);

// Route::resource('engineering', EngineeringController::class)->names([
//     'index' => 'engineering'
// ]);

// Route::get('/import/engineering', [EngineeringController::class, 'import'])->name('import-menu');
// Route::post('/import/engineering', [EngineeringController::class, 'processImport'])->name('import-process');

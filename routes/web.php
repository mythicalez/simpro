<?php

use App\Models\SubProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubProjectController;
use App\Http\Controllers\EngineeringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class)->names([
        'index' => 'dashboard'
    ])->middleware('auth');

    Route::resource('project', ProjectController::class)->names([
        'index' => 'project'
    ]);

    Route::resource('subproject', SubProjectController::class)->names([
        'index' => 'subproject'
    ]);

    Route::put('/project/{id}/nonactive', [ProjectController::class, 'nonactive'])->name('project.nonactive');

    Route::resource('phase', PhaseController::class)->names([
        'index' => 'phase'
    ]);

    // Route::resource('engineering', EngineeringController::class)->names([
    //     'index' => 'engineering'
    // ]);

    Route::get('/engineering/partlist', [EngineeringController::class, 'index'])->name('engineering-partlist');
    Route::get('/engineering/assembly_list', [EngineeringController::class, 'assembly'])->name('engineering-assembly');
    Route::get('/engineering/assembly_part_list', [EngineeringController::class, 'asspart'])->name('engineering-asspart');

    Route::get('/engineering/import-data', [EngineeringController::class, 'import'])->name('import-menu');
    Route::post('/engineering/import-data', [EngineeringController::class, 'processImport'])->name('importEng');

    Route::post('/engineering/review-data', [EngineeringController::class, 'submitFile'])->name('saveImport');


    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/register',function(){
    return view('register');
})->name('register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/projects',ProjectController::class)->middleware('auth');
Route::resource('/academicians',AcademicianController::class);
Route::resource('/staff',StaffController::class);

// Route::get('/projects/{project}/milestones', [MilestoneController::class, 'index'])->name('milestones.index');
Route::resource('/milestones',MilestoneController::class)->except(['create','store']);
Route::get('/projects/{project}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
Route::post('/projects/{project}/milestones', [MilestoneController::class, 'store'])->name('milestones.store');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
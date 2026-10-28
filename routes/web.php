<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Rute Wajib Login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects', [AppController::class, 'projects'])->name('projects');
    Route::get('/orders', [AppController::class, 'orders'])->name('orders');
    Route::get('/tasks', [AppController::class, 'tasks'])->name('tasks');
    Route::get('/customers', [AppController::class, 'customers'])->name('customers');
    Route::get('/finance', [AppController::class, 'finance'])->name('finance');
    Route::get('/reports', [AppController::class, 'reports'])->name('reports');
    Route::get('/expenses', [AppController::class, 'expenses'])->name('expenses');
    Route::get('/users', [AppController::class, 'users'])->name('users');
    Route::get('/roles', [AppController::class, 'roles'])->name('roles');
    Route::get('/staff', [AppController::class, 'staff'])->name('staff');
    Route::get('/logactivity', [AppController::class, 'logactivity'])->name('logactivity');
    
    // Profile Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
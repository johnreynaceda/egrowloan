<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'customer':
            return redirect()->route('customer.dashboard');
        case 'staff':
            return redirect()->route('staff.dashboard');

        default:
            # code...
            break;
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/menu', function () {
        return view('admin.menu');
    })->name('admin.menu');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::get('/members', function () {
        return view('admin.members');
    })->name('admin.members');
    Route::get('/loans', function () {
        return view('admin.loans');
    })->name('admin.loans');
    Route::get('/pos', function () {
        return view('admin.pos');
    })->name('admin.pos');
    Route::get('/sales', function () {
        return view('admin.sales');
    })->name('admin.sales');
});

Route::prefix('customer')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
    Route::get('/loans', function () {
        return view('customer.loans');
    })->name('customer.loans');
    Route::get('/transactions', function () {
        return view('customer.transactions');
    })->name('customer.transactions');
    Route::get('/view-record/{id}', function () {
        return view('customer.view-record');
    })->name('customer.view-record');
});
Route::prefix('staff')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');
    Route::get('/loans', function () {
        return view('staff.loans');
    })->name('staff.loans');
    Route::get('/transactions', function () {
        return view('staff.transactions');
    })->name('staff.transactions');
    Route::get('/view-record/{id}', function () {
        return view('staff.view-record');
    })->name('staff.view-record');
    Route::get('/my-payments', function () {
        return view('staff.my-payments');
    })->name('staff.my-payments');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

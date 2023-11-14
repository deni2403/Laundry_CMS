<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IronerController;
use App\Http\Controllers\PackerController;
use App\Http\Controllers\SuperAdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('superAdmin')->group(function () {
        Route::get('/superadmin/create', [SuperAdminController::class,'createOrder'])->name('create.superadmin');
        Route::post('/superadmin/store', [SuperAdminController::class,'storeOrder'])->name('store.superadmin');
        Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard.superadmin');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.admin');
        Route::get('/admin/dashboard/{event}', [AdminController::class,'showEvent']);
        Route::get('/admin/events/checkSlug', [AdminController::class,'checkSlug']);
        Route::get('/admin/events', [AdminController::class,'index']);
        Route::get('/admin/events/create', [AdminController::class,'create']);
        Route::post('/admin/events', [AdminController::class,'store']);
        Route::get('/admin/events/{event}', [AdminController::class,'show']);
        Route::get('/admin/events/{event}/edit', [AdminController::class,'edit']);
        Route::patch('/admin/events/{event}', [AdminController::class,'update']);
        Route::delete('/admin/events/{event}', [AdminController::class,'destroy']);
    });

    Route::middleware('cashier')->group(function () {
        Route::get('/cashier/create', [CashierController::class,'createOrder'])->name('create.cashier');
        Route::post('/cashier/store', [CashierController::class,'storeOrder'])->name('store.cashier');
        Route::get('/cashier/dashboard', [CashierController::class, 'dashboard'])->name('dashboard.cashier');
    });

    Route::middleware('ironer')->group(function () {
        Route::get('/ironer/dashboard', [IronerController::class, 'dashboard'])->name('dashboard.ironer');
    });

    Route::middleware('packer')->group(function () {
        Route::get('/packer/dashboard', [PackerController::class, 'dashboard'])->name('dashboard.packer');
    });
});

require __DIR__ . '/auth.php';

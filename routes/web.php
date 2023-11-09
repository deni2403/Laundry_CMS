<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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

    Route::middleware('super_admin')->group(function () {
        // Route::resource('/superadmin', OrderController::class);
        Route::get('/superadmin/create', [OrderController::class,'create'])->name('create.superadmin');
        Route::post('/superadmin/store', [OrderController::class,'store'])->name('store.superadmin');
        Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard.superadmin');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');
    });

    Route::middleware('cashier')->group(function () {
        Route::resource('/cashier', OrderController::class);
        Route::get('/dashboard/cashier', [CashierController::class, 'dashboard'])->name('dashboard.cashier');
    });

    Route::middleware('ironer')->group(function () {
        // Route::resource('/ironer', OrderController::class);
        Route::get('/dashboard/ironer', [IronerController::class, 'dashboard'])->name('dashboard.ironer');
    });

    Route::middleware('packer')->group(function () {
        // Route::resource('/packer', OrderController::class);
        Route::get('/dashboard/packer', [PackerController::class, 'dashboard'])->name('dashboard.packer');
    });


});

require __DIR__ . '/auth.php';

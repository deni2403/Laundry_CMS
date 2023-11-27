<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IronerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\WAController;
use App\Http\Controllers\WebProfileController;

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

Route::get('/', [WebProfileController::class, 'index'])->name('landingPage');
Route::get('/events/{event}', [WebProfileController::class, 'showEvent']);

// Route::post('/tracking', [TrackingController::class, 'search'])->name('searchByInvoice');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::post('/tracking', [TrackingController::class, 'index'])->name('tracking');

Route::get('/about', function () {
    return view('about');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/member-login', function () {
    return view('memberLogin');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('superAdmin')->group(function () {
        Route::get('/superadmin/create', [SuperAdminController::class, 'createOrder'])->name('createOrder.superadmin');
        Route::post('/superadmin/store', [SuperAdminController::class, 'storeOrder'])->name('storeOrder.superadmin');
        Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard.superadmin');
        //Member
        Route::get('/superadmin/index/member', [SuperAdminController::class, 'indexMember'])->name('index.member');
        Route::get('/superadmin/create/member', [SuperAdminController::class, 'createMember'])->name('create.member');
        Route::post('/superadmin/store/member', [SuperAdminController::class, 'storeMember'])->name('store.member');
        Route::get('/superadmin/edit/member/{id}', [SuperAdminController::class, 'editMember'])->name('edit.member');
        Route::put('/superadmin/member/{id}', [SuperAdminController::class, 'updateMember'])->name('update.member');
        Route::delete('/superadmin/member/{id}', [SuperAdminController::class, 'destroyMember'])->name('destroy.member');
        //user
        Route::get('/superadmin/users', [SuperAdminController::class, 'indexUser'])->name('users.superadmin'); //new
        Route::get('/superadmin/users/create', [SuperAdminController::class, 'createUser'])->name('createUser.superadmin'); //new
        Route::get('/superadmin/users/{user}/edit', [SuperAdminController::class, 'editUser']); //new
    });

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.admin');
        Route::get('/admin/dashboard/{event}', [AdminController::class, 'showEvent']);
        Route::get('/admin/events/checkSlug', [AdminController::class, 'checkSlug']);
        Route::get('/admin/events', [AdminController::class, 'index'])->name('index.admin');
        Route::get('/admin/events/create', [AdminController::class, 'create']);
        Route::post('/admin/events', [AdminController::class, 'store']);
        Route::get('/admin/events/{event}', [AdminController::class, 'show']);
        Route::get('/admin/events/{event}/edit', [AdminController::class, 'edit']);
        Route::patch('/admin/events/{event}', [AdminController::class, 'update']);
        Route::delete('/admin/events/{event}', [AdminController::class, 'destroy']);
    });

    Route::middleware('cashier')->group(function () {
        Route::get('/cashier/create', [CashierController::class, 'createOrder'])->name('createOrder.cashier');
        Route::post('/cashier/store', [CashierController::class, 'storeOrder'])->name('storeOrder.cashier');
        Route::get('/cashier/dashboard', [CashierController::class, 'dashboard'])->name('dashboard.cashier');
        Route::get('/cashier/orders', [CashierController::class, 'orderData'])->name('orderData.cashier'); //new

        Route::get('/cashier/members/index', [CashierController::class, 'indexMember'])->name('indexMember.cashier'); //new
        Route::get('/cashier/members/create', [CashierController::class, 'createMember'])->name('createMember.cashier'); //new
        Route::post('/cashier/members/store', [CashierController::class, 'storeMember'])->name('storeMember.cashier'); //new
        Route::get('/cashier/members/edit/{member}', [CashierController::class, 'editMember'])->name('editMember.cashier'); //new
        Route::patch('/cashier/members/{member}', [CashierController::class, 'updateMember'])->name('updateMember.cashier'); //new
        Route::delete('/cashier/members/{member}', [CashierController::class, 'destroyMember'])->name('destroyMember.cashier'); //new

        Route::post('/cashier/WhatsApp/{Id}', [WAController::class, 'store'])->name('store.wa');

        Route::patch('/cashier/change-status-1/{Id}', [CashierController::class, 'belumDicuciStatus'])->name('changeStatus1.cashier');
        Route::patch('/cashier/change-status-2/{Id}', [CashierController::class, 'sedangDicuciStatus'])->name('changeStatus2.cashier');
        Route::patch('/cashier/change-status-3/{Id}', [CashierController::class, 'sudahDicuciStatus'])->name('changeStatus3.cashier');
        Route::patch('/cashier/change-status-4/{Id}', [CashierController::class, 'sudahDiambilStatus'])->name('changeStatus4.cashier');
    });

    Route::middleware('ironer')->group(function () {
        Route::get('/ironer/dashboard', [IronerController::class, 'dashboard'])->name('dashboard.ironer');
        route::get('/ironer/edit', [IronerController::class, 'editOrder'])->name('editOrder.ironer');
        Route::patch('/ironer/take-order/{Id}', [IronerController::class, 'takeOrder'])->name('takeOrder.ironer');
        Route::patch('/ironer/done-order/{Id}', [IronerController::class, 'doneOrder'])->name('doneOrder.ironer');
        Route::get('/ironer/orders', [IronerController::class, 'orderData'])->name('orderData.ironer'); //new
    });

    Route::middleware('packer')->group(function () {
        Route::get('/packer/dashboard', [PackerController::class, 'dashboard'])->name('dashboard.packer');
        Route::patch('/packer/take-order/{Id}', [PackerController::class, 'takeOrder'])->name('takeOrder.packer');
        Route::patch('/packer/done-order/{Id}', [PackerController::class, 'doneOrder'])->name('doneOrder.packer');
        Route::get('/packer/orders', [PackerController::class, 'orderData'])->name('orderData.packer'); //new
    });
});


require __DIR__ . '/auth.php';

Route::middleware('auth:member', 'member')->group(function () {
    Route::get('/member', function () {
        return view('adminProfile');
    });
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

Route::get('/member', function () {
    return view('memberProfile');
})->middleware(['auth:member', 'member']);

require __DIR__ . '/authMember.php';    //new

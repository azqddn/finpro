<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookkeepingController;
use App\Http\Controllers\InventoryController;
use App\Models\User;
use Faker\Guesser\Name;

/**
 * Logout redirect
 */
Route::get('/', function () {
    return view('auth.login');
});

/**
 * Authentication route
 */
// Route for login, register, logout, etc...
Auth::routes();
// Disable route for register because i want to use my custom route and controller for register
Auth::routes(['register' => false]);


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::group(['prefix' => 'admin/'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');

        // Manage Account and Profile
        Route::get('/user/list', [UserController::class, 'index'])->name('display.user');
        Route::get('/register', [UserController::class, 'create'])->name('create.register');
        Route::post('/register/user', [UserController::class, 'store'])->name('store.register');
        Route::get('/edit/{id}/user/account', [UserController::class, 'edit'])->name('display.edit.user');
        Route::post('/update/{id}/user/account', [UserController::class, 'update'])->name('update.user.account');
        Route::post('/update/{id}/user/information', [UserController::class, 'updateUser'])->name('update.user.info');
        Route::get('/delete/{id}/user', [UserController::class, 'destroy'])->name('delete.user');
        Route::get('/company/profile', [UserController::class, 'displayCompany'])->name('display.company');
        Route::get('/edit/{id}/company', [UserController::class, 'editCompany'])->name('edit.company');
        Route::post('/update/{id}/company', [UserController::class, 'updateCompany'])->name('update.company');
        Route::get('/user/profile', [UserController::class, 'displayProfileAdmin'])->name('display.profile.admin');
        Route::get('/change/{id}/password', [UserController::class, 'editPasswordAdmin'])->name('edit.admin.password');
        Route::post('/update/{id}/password', [UserController::class, 'updatePasswordAdmin'])->name('update.admin.password');
    });
});



/*------------------------------------------
--------------------------------------------
All Business Owner Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:owner'])->group(function () {
    Route::group(['prefix' => '/owner'], function () {
        Route::get('/dashboard', [HomeController::class, 'ownerHome'])->name('owner.home');

        //Manage Account and Profile
        Route::get('/user/profile', [UserController::class, 'displayProfileOwner'])->name('display.profile.owner');
        Route::get('/change/{id}/password', [UserController::class, 'editPasswordOwner'])->name('edit.password.owner');
        Route::post('/update/{id}/password', [UserController::class, 'updatePasswordOwner'])->name('update.password.owner');
        Route::get('/company/profile', [UserController::class, 'displayCompanyOwner'])->name('display.company.owner');

        //Manage Inventory
        Route::get('/product/list',[InventoryController::class, 'displayProduct'])->name('display.product.owner');
        Route::get('/add/product',[InventoryController::class, 'createProduct'])->name('add.product.owner');
        Route::post('/store/product', [InventoryController::class, 'storeProduct'])->name('store.product.owner');
        Route::post('/remove/{id}/product', [InventoryCOntroller::class, 'removeProduct'])->name('remove.product.owner');
        Route::get('/product/history', [InventoryController::class, 'displayProductHistory'])->name('display.product.history.owner');
        Route::get('/destroy/{id}/product', [InventoryController::class, 'destroyProduct'])->name('destroy.product.owner');
        Route::get('/edit/{id}/product', [InventoryController::class, 'editProduct'])->name('edit.product.owner');
        Route::post('/update/{id}/product', [InventoryController::class, 'updateProduct'])->name('update.product.owner');
        Route::get('/product/edit/history', [InventoryController::class, 'displayEditHistory'])->name('display.edit.history');
        Route::delete('/delete/{id}/edit/history', [InventoryController::class, 'destroyEditHistory'])->name('destroy.edit.history.owner');
        Route::get('/product/alert', [InventoryController::class, 'displayProductAlert'])->name('display.product.alert.owner');

        //Manage Bookkeeping
        Route::get('/bookkeeping/record', [BookkeepingController::class, 'displayRecord'])->name('display.record.owner');
        Route::post('/bookkeeping/record/opened',[BookkeepingController::class, 'storeOpeningRecord'])->name('store.open.record.owner');
        Route::post('/bookkeeping/record/closed',[BookkeepingController::class, 'storeClosingRecord'])->name('store.close.record.owner');
        Route::post('/bookkeeping/record/store', [BookkeepingController::class, 'storeRecord'])->name('store.record.owner');
        Route::get('/bookkeeping/{id}/record/remove', [BookkeepingController::class, 'removeRecord'])->name('remove.record.owner');

    });
});



/*------------------------------------------
--------------------------------------------
All Staff Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::group(['prefix' => '/staff'], function () {
        Route::get('/dashboard', [HomeController::class, 'staffHome'])->name('staff.home');

        //Manage Account and Profile
        Route::get('/user/profile', [UserController::class, 'displayProfileStaff'])->name('display.profile.staff');
        Route::get('/change/{id}/password', [UserController::class, 'editPasswordStaff'])->name('edit.password.staff');
        Route::post('/update/{id}/password',[UserController::class, 'updatePasswordStaff'])->name('update.password.staff');
        Route::get('/company/profile', [UserController::class, 'displayCompanyStaff'])->name('display.company.staff');
    });
});
;
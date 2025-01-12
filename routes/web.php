<?php

use App\Models\User;
use App\Models\Report;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BookkeepingController;
use App\Http\Controllers\Auth\RegisterController;

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
All "Admin" Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::group(['prefix' => 'admin/'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');

        // Manage Account and Company Profile
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

        //Manage Inventory
        Route::get('/product/list', [InventoryController::class, 'displayProduct'])->name('display.product.admin');
        Route::get('/add/product', [InventoryController::class, 'createProduct'])->name('add.product.admin');
        Route::post('/store/product', [InventoryController::class, 'storeProduct'])->name('store.product.admin');
        Route::post('/remove/{id}/product', [InventoryController::class, 'removeProduct'])->name('remove.product.admin');
        Route::get('/product/history', [InventoryController::class, 'displayProductHistory'])->name('display.product.history.admin');
        Route::get('/destroy/{id}/product', [InventoryController::class, 'destroyProduct'])->name('destroy.product.admin');
        Route::get('/edit/{id}/product', [InventoryController::class, 'editProduct'])->name('edit.product.admin');
        Route::post('/update/{id}/product', [InventoryController::class, 'updateProduct'])->name('update.product.admin');
        Route::get('/product/edit/history', [InventoryController::class, 'displayEditHistory'])->name('display.edit.history.admin');
        Route::delete('/delete/{id}/edit/history', [InventoryController::class, 'destroyEditHistory'])->name('destroy.edit.history.admin');
        // Route::get('/product/alert', [InventoryController::class, 'displayProductAlert'])->name('display.product.alert.admin');

        //Manage Bookkeeping
        Route::get('/bookkeeping/record', [BookkeepingController::class, 'displayRecord'])->name('display.record.admin');
        Route::post('/bookkeeping/record/opened', [BookkeepingController::class, 'storeOpeningRecord'])->name('store.open.record.admin');
        Route::post('/bookkeeping/record/closed', [BookkeepingController::class, 'storeClosingRecord'])->name('store.close.record.admin');
        Route::post('/bookkeeping/record/store', [BookkeepingController::class, 'storeRecord'])->name('store.record.admin');

        //Manage Report
        Route::get('/report/create', [ReportController::class, 'createReport'])->name('admin.report.create');
        Route::post('/report/generate', [ReportController::class, 'generate'])->name('admin.report.generate');
        Route::get('/report/download/{fileName}', [ReportController::class, 'download'])->name('admin.report.download');  
        Route::get('/report/list', [ReportController::class,'displayReport'])->name('admin.display.report');  
        Route::delete('/delete/{id}/report', [ReportController::class, 'destroyReport'])->name('admin.destroy.report');

    });
});



/*------------------------------------------
--------------------------------------------
All "Business Owner" Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:owner'])->group(function () {
    Route::group(['prefix' => '/owner'], function () {
        Route::get('/dashboard', [HomeController::class, 'ownerHome'])->name('owner.home');

        //Manage Account and Company Profile
        Route::get('/user/profile', [UserController::class, 'displayProfileOwner'])->name('display.profile.owner');
        Route::get('/change/{id}/password', [UserController::class, 'editPasswordOwner'])->name('edit.password.owner');
        Route::post('/update/{id}/password', [UserController::class, 'updatePasswordOwner'])->name('update.password.owner');
        Route::get('/company/profile', [UserController::class, 'displayCompanyOwner'])->name('display.company.owner');

        //Manage Inventory
        Route::get('/product/list', [InventoryController::class, 'displayProduct'])->name('display.product.owner');
        Route::get('/add/product', [InventoryController::class, 'createProduct'])->name('add.product.owner');
        Route::post('/store/product', [InventoryController::class, 'storeProduct'])->name('store.product.owner');
        Route::post('/remove/{id}/product', [InventoryController::class, 'removeProduct'])->name('remove.product.owner');
        Route::get('/product/history', [InventoryController::class, 'displayProductHistory'])->name('display.product.history.owner');
        Route::get('/destroy/{id}/product', [InventoryController::class, 'destroyProduct'])->name('destroy.product.owner');
        Route::get('/edit/{id}/product', [InventoryController::class, 'editProduct'])->name('edit.product.owner');
        Route::post('/update/{id}/product', [InventoryController::class, 'updateProduct'])->name('update.product.owner');
        Route::get('/product/edit/history', [InventoryController::class, 'displayEditHistory'])->name('display.edit.history');
        Route::delete('/delete/{id}/edit/history', [InventoryController::class, 'destroyEditHistory'])->name('destroy.edit.history.owner');
        Route::get('/product/alert', [InventoryController::class, 'displayProductAlert'])->name('display.product.alert.owner');

        //Manage Bookkeeping
        Route::get('/bookkeeping/record', [BookkeepingController::class, 'displayRecord'])->name('display.record.owner');
        Route::post('/bookkeeping/record/opened', [BookkeepingController::class, 'storeOpeningRecord'])->name('store.open.record.owner');
        Route::post('/bookkeeping/record/closed', [BookkeepingController::class, 'storeClosingRecord'])->name('store.close.record.owner');
        Route::post('/bookkeeping/record/store', [BookkeepingController::class, 'storeRecord'])->name('store.record.owner');

        //Manage Report
        Route::get('/report/create', [ReportController::class, 'createReport'])->name('owner.report.create');
        Route::post('/report/generate', [ReportController::class, 'generate'])->name('owner.report.generate');
        Route::get('/report/download/{fileName}', [ReportController::class, 'download'])->name('report.download'); 
        Route::get('/report/list', [ReportController::class,'displayReport'])->name('owner.display.report');  
        Route::delete('/delete/{id}/report', [ReportController::class, 'destroyReport'])->name('owner.destroy.report');
    });
});



/*------------------------------------------
--------------------------------------------
All "Staff" Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::group(['prefix' => '/staff'], function () {
        Route::get('/dashboard', [HomeController::class, 'staffHome'])->name('staff.home');

        //Manage Account and Profile
        Route::get('/user/profile', [UserController::class, 'displayProfileStaff'])->name('display.profile.staff');
        Route::get('/change/{id}/password', [UserController::class, 'editPasswordStaff'])->name('edit.password.staff');
        Route::post('/update/{id}/password', [UserController::class, 'updatePasswordStaff'])->name('update.password.staff');
        Route::get('/company/profile', [UserController::class, 'displayCompanyStaff'])->name('display.company.staff');

        //Manage Inventory
        Route::get('/product/list', [InventoryController::class, 'displayProduct'])->name('display.product.staff');
        Route::get('/add/product', [InventoryController::class, 'createProduct'])->name('add.product.staff');
        Route::post('/store/product', [InventoryController::class, 'storeProduct'])->name('store.product.staff');
        Route::post('/remove/{id}/product', [InventoryController::class, 'removeProduct'])->name('remove.product.staff');
        Route::get('/product/history', [InventoryController::class, 'displayProductHistory'])->name('display.product.history.staff');
        Route::get('/destroy/{id}/product', [InventoryController::class, 'destroyProduct'])->name('destroy.product.staff');
        Route::get('/edit/{id}/product', [InventoryController::class, 'editProduct'])->name('edit.product.staff');
        Route::post('/update/{id}/product', [InventoryController::class, 'updateProduct'])->name('update.product.staff');
        Route::get('/product/edit/history', [InventoryController::class, 'displayEditHistory'])->name('display.edit.history.staff');
        Route::delete('/delete/{id}/edit/history', [InventoryController::class, 'destroyEditHistory'])->name('destroy.edit.history.staff');

        //Manage Bookkeeping
        Route::get('/bookkeeping/record', [BookkeepingController::class, 'displayRecord'])->name('display.record.staff');
        Route::post('/bookkeeping/record/opened', [BookkeepingController::class, 'storeOpeningRecord'])->name('store.open.record.staff');
        Route::post('/bookkeeping/record/closed', [BookkeepingController::class, 'storeClosingRecord'])->name('store.close.record.staff');
        Route::post('/bookkeeping/record/store', [BookkeepingController::class, 'storeRecord'])->name('store.record.staff');

        //Manage Report
        Route::get('/report/create', [ReportController::class, 'createReport'])->name('staff.report.create');
        Route::post('/report/generate', [ReportController::class, 'generate'])->name('staff.report.generate');
        Route::get('/report/download/{fileName}', [ReportController::class, 'download'])->name('staff.report.download');
        Route::get('/report/list', [ReportController::class,'displayReport'])->name('staff.display.report');  
        Route::delete('/delete/{id}/report', [ReportController::class, 'destroyReport'])->name('staff.destroy.report');

    });
});;

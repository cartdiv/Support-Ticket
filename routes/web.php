<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landlord\DashboardController;
use App\Http\Controllers\Landlord\TenantsController;
use App\Http\Controllers\Landlord\UserController;
use App\Http\Controllers\Tenant\TenantDashboard;

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

//Landlord Middleware
Route::middleware(['auth','roles:landlord'])->group(function (){
    //Landlord Dashboard
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/landlord/dashboard', 'LandlordDashboard')->name('landlord.dashboard');
        Route::get('/landlord/edit/profile', 'LandlordEditProfile')->name('landlord.edit.profile');
        Route::get('/landlord/logout', 'LandlordLogout')->name('landlord.logout');
        Route::post('/update/landlord/details', 'UpdateLandlordDetails')->name('update.landlord.details');
        Route::get('/landlord/change/password', 'LandlordChangePassword')->name('landlord.change.password');
        Route::post('/landlord/Update/change/password', 'LandlordUpdateChangePassword')->name('landlord.update.change.password');

        
    });

    //Tenant informations
    Route::controller(TenantsController::class)->group(function(){
        Route::get('/landlord/all/tenants', 'AllTenants')->name('all.tenants');
        Route::get('/landlord/edit/tenant/detail/{id}', 'EditTenantDetail')->name('edit.tenants.detail');
        Route::post('/update/tenant/status', 'UpdateTenantStatus')->name('update.tenant.status');
        Route::get('/landlord/active/tenant', 'ActiveTenant')->name('active.tenant');
        Route::get('/landlord/inactive/tenant', 'InactiveTenant')->name('inactive.tenant');
        Route::get('/landlord/delete/tenant/detail/{id}', 'DeleteTenantDetail')->name('delete.tenants.detail');

    });

    //User informations
    Route::controller(UserController::class)->group(function(){
        Route::get('/landlord/all/users', 'AllUsers')->name('all.users');
        Route::get('/landlord/active/users', 'ActiveUsers')->name('active.users');
        Route::get('/landlord/inactive/users', 'InactiveUsers')->name('inactive.users');
        Route::get('/landlord/edit/user/detail/{id}', 'EditUserDetail')->name('edit.users.detail');
        Route::post('/update/user/status', 'UpdateUserStatus')->name('update.user.status');
        // Route::get('/landlord/active/tenant', 'ActiveTenant')->name('active.tenant');
        // Route::get('/landlord/inactive/tenant', 'InactiveTenant')->name('inactive.tenant');
        Route::get('/landlord/delete/user/detail/{id}', 'DeleteUserDetail')->name('delete.users.detail');

    });
});

 //Tenant Public
 Route::controller(DashboardController::class)->group(function(){
    Route::get('/landlord/login', 'LandlordLogin')->name('landlord.login');
});


//Tenant Middleware
Route::middleware(['auth','roles:tenant'])->group(function (){
    //Tenant Dashboard
    Route::controller(TenantDashboard::class)->group(function(){
        Route::get('/tenant/dashboard', 'TenantDashboard')->name('tenant.dashboard');
        Route::get('/tenant/logout', 'TenantLogout')->name('tenant.logout');
        Route::get('/tenant/edit/profile', 'TenantEditProfile')->name('tenant.edit.profile');
        Route::post('/update/tentant/details', 'UpdateTentantDetails')->name('update.tentant.details');
        Route::get('/tenant/change/password', 'TenantChangePassword')->name('tenant.change.password');
        Route::post('/tenant/Update/change/password', 'TenantUpdateChangePassword')->name('tenant.update.change.password');
    });
});


 //Tenant Public
Route::controller(TenantDashboard::class)->group(function(){
    Route::get('/tenant/login', 'TenantLogin')->name('tenant.login');
});
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

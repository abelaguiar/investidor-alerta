<?php

use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RoleController::class);

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('user/profile', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('user/authorized', [UserController::class, 'requestAuthorization'])->name('user.request.authorization');
    Route::get('user/{user}/authorized', [UserController::class, 'authorizeUser'])->name('user.authorize');
    Route::resource('users', UserController::class);

    Route::get('avaliation/{product}/{topic?}', [AvaliationController::class, 'index'])->name('avaliation.index');
    Route::resource('avaliations', AvaliationController::class)->except(['index']);
    
    Route::get('companies/search', [CompanyController::class, 'search'])->name('companies.search');
    Route::resource('companies', CompanyController::class);

    //Route::get('shops/search', [ShopController::class, 'search'])->name('shops.search');
    //Route::get('shops/search-cnpj', [ShopController::class, 'searchByCnpj'])->name('shops.search.cnpj');
    //Route::post('shops/search-cnpj/processing', [ShopController::class, 'searchByCnpj'])->name('shops.search.cnpj.processing');
    //Route::post('shops/{shop}/processing-to-assign-VISITOR', [ShopController::class, 'show'])->name('shops.show.processing');
    //Route::resource('shops', ShopController::class);
});

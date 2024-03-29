<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\HomeController;

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



Route::prefix('admin')->group(function () {
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::controller(AdminAuthController::class)->group(function(){
            Route::get('/login','index')->name('admin.login');
            Route::post('/authenticate','authenticate')->name('admin.authenticate');
        });
    });
    Route::group(['middleware'=>'admin.auth'],function(){
        Route::controller(HomeController::class)->group(function(){
            Route::get('/dashboard','index')->name('admin.dashboard');
            Route::get('/logout','logout')->name('admin.logout');
        });
    });
});

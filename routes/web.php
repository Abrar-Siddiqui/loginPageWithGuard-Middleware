<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategorController;
use Illuminate\Http\Request;

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
        // Categories Route
        Route::controller(CategorController::class)->group(function(){
            Route::get('/categories','index')->name('categories.index');
            Route::get('/categories/create','create')->name('admin.categories');
            Route::post('/categories','store')->name('categories.store');


        });

        //For create slug
        Route::get('/getSlug',function(Request $request){
            $slug = '';
            if(!empty($request->title)){
                $slug = Str::slug($request->title);
            }
            return response()->json([
                'status'=>true,
                'slug' => $slug
            ]);
        })->name('getSlug');
    });
});

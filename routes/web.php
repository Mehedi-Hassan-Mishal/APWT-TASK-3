<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('/admin_edit',[DashboardController::class,'admin_edit'])->name('admin_edit');
    Route::post('/update',[DashboardController::class,'Update'])->name('update');
});


require __DIR__.'/auth.php';

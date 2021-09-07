<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//User Routes

Route::prefix('users')->group(function(){

    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'usersEdit']);
    Route::post('/update/{id}',[UserController::class,'usersUpdate']);

    Route::get('/delete/{id}',[UserController::class,'UserDelete']);

});

Route::prefix('profile')->group(function(){

    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('edit.profile');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('store.profile');
    Route::get('/password/view',[ProfileController::class,'ViewPassword'])->name('edit.password');
    Route::post('/password/update',[ProfileController::class,'UpdatePassword'])->name('store.password');

});







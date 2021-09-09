<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Setup\SetupController;
use App\Http\Controllers\Setup\StudentYearController;
use App\Http\Controllers\Setup\DepartmentController;
use App\Http\Controllers\Setup\FeeCategoryController;

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


Route::prefix('setups')->group(function(){

    Route::get('/view',[SetupController::class,'ClassView'])->name('class.view');
    Route::get('/add',[SetupController::class,'ClassAdd'])->name('class.add');
    Route::post('/store',[SetupController::class,'ClassStore'])->name('class.store');
    Route::get('/edit/class/{id}',[SetupController::class,'ClassEdit']);
    Route::post('/update/class/{id}',[SetupController::class,'ClassUpdate']);
    Route::get('/delete/class/{id}',[SetupController::class,'ClassDelete']);

    //Student Year 
    Route::get('/view/year',[StudentYearController::class,'YearView'])->name('year.view');
    Route::get('/add/year',[StudentYearController::class,'YearAdd'])->name('year.add');
    Route::post('/store/year',[StudentYearController::class,'YearStore'])->name('year.store');
    Route::get('/edit/year/{id}',[StudentYearController::class,'YearEdit']);
    Route::post('/update/year/{id}',[StudentYearController::class,'YearUpdate']);
    Route::get('/delete/year/{id}',[StudentYearController::class,'YearDelete']);

    //Department 
    Route::get('/view/department',[DepartmentController::class,'DepartmentView'])->name('department.view');
    Route::get('/add/department',[DepartmentController::class,'DepartmentAdd'])->name('department.add');
    Route::post('/store/department',[DepartmentController::class,'DepartmentStore'])->name('department.store');
    Route::get('/edit/department/{id}',[DepartmentController::class,'DepartmentEdit']);
    Route::post('/update/department/{id}',[DepartmentController::class,'DepartmentUpdate']);
    Route::get('/delete/department/{id}',[DepartmentController::class,'DepartmentDelete']);

    //Fee Category
    Route::get('/view/fee',[FeeCategoryController::class,'FeeView'])->name('fee.view');
    Route::get('/add/fee',[FeeCategoryController::class,'FeeAdd'])->name('fee.add');
    Route::post('/store/fee',[FeeCategoryController::class,'FeeStore'])->name('fee.store');
    Route::get('/edit/fee/{id}',[FeeCategoryController::class,'FeeEdit']);
    Route::post('/update/fee/{id}',[FeeCategoryController::class,'FeeUpdate']);
    Route::get('/delete/fee/{id}',[FeeCategoryController::class,'FeeDelete']);

    //Fee Category Amount Field
    /*Route::get('/view/fee',[FeeCategoryController::class,'FeeView'])->name('fee.amount.view');
    Route::get('/add/fee',[FeeCategoryController::class,'FeeAdd'])->name('fee.add');
    Route::post('/store/fee',[FeeCategoryController::class,'FeeStore'])->name('fee.store');
    Route::get('/edit/fee/{id}',[FeeCategoryController::class,'FeeEdit']);
    Route::post('/update/fee/{id}',[FeeCategoryController::class,'FeeUpdate']);
    Route::get('/delete/fee/{id}',[FeeCategoryController::class,'FeeDelete']);*/

});








<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Setup\SetupController;
use App\Http\Controllers\Setup\StudentYearController;
use App\Http\Controllers\Setup\DepartmentController;
use App\Http\Controllers\Setup\FeeCategoryController;
use App\Http\Controllers\Setup\FeeAmountController;
use App\Http\Controllers\Setup\ExamTypeController;
use App\Http\Controllers\Setup\SubjectController;
use App\Http\Controllers\Setup\AssignSubjectController;
use App\Http\Controllers\Setup\DesignationController;
use App\Http\Controllers\backend\Student\StudentRegController;

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

//Profile Routes

Route::prefix('profile')->group(function(){

    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('edit.profile');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('store.profile');
    Route::get('/password/view',[ProfileController::class,'ViewPassword'])->name('edit.password');
    Route::post('/password/update',[ProfileController::class,'UpdatePassword'])->name('store.password');

});

//Setups Routes
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
    Route::get('/view/fee/amount',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');
    Route::get('/add/fee/amount',[FeeAmountController::class,'FeeAmountAdd'])->name('feeAmount.add');
    Route::post('/store/fee/amount',[FeeAmountController::class,'FeeAmountStore'])->name('store.fee.amount');
    Route::get('/edit/fee/amount/{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');
    Route::post('/update/fee/amount/{fee_category_id}',[FeeAmountController::class,'FeeAmountUpdate']);
    Route::get('/details/fee/amount/{fee_category_id}',[FeeAmountController::class,'FeeAmountDetails']);


    //ExamType Controller
    Route::get('/view/examType',[ExamTypeController::class,'examTypeView'])->name('examType.view');
    Route::get('/add/examType',[ExamTypeController::class,'examTypeAdd'])->name('examType.add');
    Route::post('/store/examType',[ExamTypeController::class,'examTypeStore'])->name('examType.store');
    Route::get('/edit/examType/{id}',[ExamTypeController::class,'examTypeEdit']);
    Route::post('/update/examType/{id}',[ExamTypeController::class,'examTypeUpdate']);
    Route::get('/delete/examType/{id}',[ExamTypeController::class,'examTypeDelete']);


    //Subject Controller
    Route::get('/view/subject',[SubjectController::class,'subjectView'])->name('subject.view');
    Route::get('/add/subject',[SubjectController::class,'subjectAdd'])->name('subject.add');
    Route::post('/store/subject',[SubjectController::class,'subjectStore'])->name('subject.store');
    Route::get('/edit/subject/{id}',[SubjectController::class,'subjectEdit']);
    Route::post('/update/subject/{id}',[SubjectController::class,'subjectUpdate']);
    Route::get('/delete/subject/{id}',[SubjectController::class,'subjectDelete']);


    //Fee Category Amount Field
           
    Route::get('/view/assign/subject',[AssignSubjectController::class,'AssignSubjectView'])->name('assign.subject.view');
    Route::get('/add/assign/subject',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign.subject.add');
    Route::post('/store/assign/subject',[AssignSubjectController::class,'AssignSubjectStore'])->name('store.assign.subject');
    Route::get('/edit/assign/subject/{department_id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('/update/assign/subject/{department_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('update.assign.subject');
    Route::get('/details/assign/subject/{department_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign.subject.details');


    //Designation Controller
    Route::get('/view/designation',[DesignationController::class,'designationView'])->name('designation.view');
    Route::get('/add/designation',[DesignationController::class,'designationAdd'])->name('designation.add');
    Route::post('/store/designation',[DesignationController::class,'designationStore'])->name('designation.store');
    Route::get('/edit/designation/{id}',[DesignationController::class,'designationEdit']);
    Route::post('/update/designation/{id}',[DesignationController::class,'designationUpdate']);
    Route::get('/delete/designation/{id}',[DesignationController::class,'designationDelete']);

});


/// Student Registration Routes  
Route::prefix('students')->group(function(){

    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');  
    Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');  
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');   
    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
     Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
     Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
     Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
     Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
    
    // Student Roll Generate Routes 
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
     Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
     Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
    
    // // Registration Fee Routes 
     Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
     Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
     Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');
    
    
    // // Monthly Fee Routes 
     Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
     Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
     Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
    
     // Exam Fee Routes 
     Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
     Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
     Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
    
    }); 








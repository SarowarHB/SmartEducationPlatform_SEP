<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
use App\Http\Controllers\backend\advising\AdvisingController;
use App\Http\Controllers\backend\marks\MarksController;
use App\Http\Controllers\backend\marks\GradeController;
use App\Http\Controllers\backend\report\MarkSheetController;
use App\Http\Controllers\backend\DefaultController;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $id=Auth::user()->id;
    $data=User::find($id);
   

    return view('admin.index',compact('data'));
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



Route::prefix('advising')->group(function(){

         Route::get('/view',[AdvisingController::class,'advisingView'])->name('advising.view');
         Route::get('/add/{student_id}',[AdvisingController::class,'advisingAdd'])->name('advising.add');
         Route::post('/store/{student_id}',[AdvisingController::class,'advisingStore'])->name('advising.store');
         Route::get('/view/students',[AdvisingController::class,'StudentClassYearWise'])->name('student.year.class.wise');
    
});


/// Marks Management Routes  
Route::prefix('marks')->group(function(){

    Route::get('marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
    Route::post('marks/entry', [MarksController::class, 'MarksEntry'])->name('marks.entry'); 
    Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store'); 
    Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
    Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  
    
     // Marks Entry Grade 
    
     Route::get('marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
     Route::get('marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
     Route::post('marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');
     Route::get('marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
     Route::post('marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');
}); 
 
 
     Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
     Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');


     /// Report Management All Routes  
Route::prefix('reports')->group(function(){

    // MarkSheet Generate Routes 
    Route::get('marksheet/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');
    Route::post('marksheet/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');
    
    
    // Attendance Report Routes 
    Route::get('attendance/report/view', [AttenReportController::class, 'AttenReportView'])->name('attendance.report.view');
    Route::get('report/attendance/get', [AttenReportController::class, 'AttenReportGet'])->name('report.attendance.get');
    
    // Student Result Report Routes 
    Route::get('student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');
    Route::get('student/result/get', [ResultReportController::class, 'ResultGet'])->name('report.student.result.get');
    
    // Student ID Card Routes 
    Route::get('student/idcard/view', [ResultReportController::class, 'IdcardView'])->name('student.idcard.view');
    Route::get('student/idcard/get', [ResultReportController::class, 'IdcardGet'])->name('report.student.idcard.get');
    
    }); 
     
    

<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentsMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;
use App\Models\Department;
use App\Models\AssignStudent;
use App\Models\FeeAmountCategory;
use App\Models\User;
use DB;
use Auth;

class AccountsController extends Controller
{
    public function RegFeeView(){
        $dep = Department::all();
        
        //$data['years'] = StudentYear::orderBy('id','desc')->get();

        $years = DB::table('student_years')
        ->orderBy('id', 'desc')
        ->first();

    	return view('backend.accounts.add_registrationFee',compact('dep','years'));
        
    }

    public function RegFeeAdd(Request $request)
    {
        $department_id = $request->id;
    	$id_no = $request->id_no;
        $year_id= $request->year_id;

        $std_id = DB::table('users')->where('id_no', $id_no)->value('id');
        $class_id = DB::table('assign_students')->where('student_id', $std_id)->value('class_id');
        //dd($class_id);

        $editData= AssignStudent::with(['student','student_class','student_year','group'])
        ->where('student_id',$std_id)->first();
        

        $amounts = FeeAmountCategory::where('department_id',$department_id)
        ->where('class_id',$class_id)
        ->first();
        dd($amounts);
        

        return view('backend.accounts.enter_regFee',compact('editData','amounts'));
   

    }
}

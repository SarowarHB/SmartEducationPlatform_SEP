<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Department;
use App\Models\Advising;
use App\Models\Subject;

use DB;
use PDF;

use App\Models\AssignSubject;
use App\Models\StudentMarks;
use App\Models\ExamType;

class DefaultController extends Controller
{
    public function GetSubject(Request $request){
    	$id = $request->id;
    
		$allData = Subject::with(['student_department'])->where('department_id',$id)->get();
		
    	return response()->json($allData);

    }


    public function GetStudents(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
		$assign_subject_id=$request->assign_subject_id;
    	$allData = Advising::with(['student'])->where('year_id',$year_id)->where('subject_id',$assign_subject_id)->get();
    	return response()->json($allData);

    }

    
}

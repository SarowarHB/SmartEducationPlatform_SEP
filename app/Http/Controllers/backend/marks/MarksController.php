<?php

namespace App\Http\Controllers\backend\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Department;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscuntStudent;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\Advising;
use App\Models\StudentsMarks;
use App\Models\TeachersCourse;
use DB;
use PDF;
use Auth;

class MarksController extends Controller
{
    public function MarksAdd(){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();
       
        $id=Auth::user()->id;
        $data['subjects']= TeachersCourse::select('subject_id')->where('teacher_id',$id)->get();
        $data['all_departments'] = Department::all();
        

    	return view('backend.studentManagent.marrksManagement.marks_add',$data);
       

    }

    public function MarksEntry(Request $request){


                $data['datas'] = Advising::with(['student','group','student_year','student_class','subject'])
                    ->where('year_id',$request->year_id)->where('subject_id',$request->subject_id)->get();


                $data['examId'] =  $request->exam_type_id;
 
                return view('backend.studentManagent.marrksManagement.marks_entry',$data);
              

             
    } 
    
    public function MarksStore(Request $request){

    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New StudentsMarks();
    		$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->department_id = $request->id;
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

    }// end method
    
}

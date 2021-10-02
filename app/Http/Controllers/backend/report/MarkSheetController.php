<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentsMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;
use App\Models\Department;
use App\Models\User;
use DB;

class MarkSheetController extends Controller
{
    public function MarkSheetView(){

    	
    	$data['dep'] = Department::all();
    	return view('backend.transcripts.transcripts_search',$data);
        

    }


    public function MarkSheetGet(Request $request){

    	$department_id = $request->id;
    	$id_no = $request->id_no;


    

        $std_id = DB::table('users')->where('id_no', $id_no)->value('id');
        //dd($std_id);
    	

    //$count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail);
    $data['demo'] = StudentsMarks::where('student_id',$std_id)->get();

    return view('backend.transcripts.view_transcript',$data);

    // if ($singleStudent == true) {
    
    // $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
    // 	// dd($allMarks->toArray());
    // $allGrades = MarksGrade::all();
    // return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades','count_fail'));

    // }else{

    // 	$notification = array(
    // 		'message' => 'Sorry These Criteria Donse not match',
    // 		'alert-type' => 'error'
    // 	);

    // 	return redirect()->back()->with($notification);
    //    }


  

    //
}
}

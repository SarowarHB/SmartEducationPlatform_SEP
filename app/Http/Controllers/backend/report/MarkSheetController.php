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
use App\Models\AssignStudent;
use App\Models\User;
use DB;
use Auth;

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

        if($std_id != NULL){

        
        //dd($std_id);
    	

    //$count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail);

    $data['data'] = StudentsMarks::select('exam_type_id')->groupBy('exam_type_id')
    ->where('student_id',$std_id)->get();
    
    $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$std_id)->first();

    $data['demo'] = StudentsMarks::where('student_id',$std_id)->get();


    return view('backend.transcripts.view_transcript',$data);
        }
        else{
            $notification= array(
                'message' =>'Student Not Found',
                'alert-type'=>'error'
            );
           
            return Redirect()->route('marksheet.generate.view')->with($notification);
        }

   
    }

    public function ResultView(){

        


    

        $std_id = Auth::user()->id;
        //dd($std_id);
    	

    //$count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail);

    $data['data'] = StudentsMarks::select('exam_type_id')->groupBy('exam_type_id')
    ->where('student_id',$std_id)->get();
    
    $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$std_id)->first();

    $data['demo'] = StudentsMarks::where('student_id',$std_id)->get();


    return view('backend.transcripts.view_transcript',$data);

    }
}

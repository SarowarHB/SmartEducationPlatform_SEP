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
use DB;
use PDF;

class MarksController extends Controller
{
    public function MarksAdd(){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();
        $data['all_subjects'] = Subject::all();
        

    	return view('backend.studentManagent.marrksManagement.marks_add',$data);
       

    }

    public function MarksEntry(Request $request){


                $data['datas'] = Advising::with(['student','group','student_year','student_class','subject'])
                    ->where('year_id',$request->year_id)->where('subject_id',$request->subject_id)->get();


                $data['examId'] =  $request->exam_type_id;

                

                

                return view('backend.studentManagent.marrksManagement.marks_entry',$data);
              

             
    } 
    
    
    public function MarksStore(Request $request){

        $year_id=


        $counter=count($request->marks);

        if($counter !=NULL){

            for($i=0;$i<$counter;$i++){

                $markAdd = new StudentsMarks();

                
                $markAdd->student_id=$request->student_id[$i];
                $markAdd->marks=$request->marks[$i];
                $markAdd->assign_subject_id=$request->assign_subject_id[$i];
                $markAdd->department_id=$request->department_id[$i];
                $markAdd->exam_type_id=$request->exam_type_id[$i];

                $markAdd->year_id=$request->year_id[$i];
                $markAdd->class_id=$request->class_id[$i];
                $markAdd->save();


            }
        }

        $notification= array(
            'message' =>'Fee Amount Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('marks.entry.add')->with($notification);
    }
}

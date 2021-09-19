<?php

namespace App\Http\Controllers\backend\advising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Department;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscuntStudent;
use App\Models\Advising;
use App\Models\Subject;
use DB;
use PDF;

class AdvisingController extends Controller
{
    public function advisingView(){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
        $data['users']=User::all();

    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
    
    	$data['allData'] = AssignStudent::all();
      
    	

        return view('backend.Advising.view_student',$data);
       

    }

  
        public function StudentClassYearWise(Request $request){
            $data['years'] = StudentYear::all();
            $data['classes'] = StudentClass::all();
    
            $data['year_id'] = $request->year_id;
            $data['class_id'] = $request->class_id;
             
            $data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
            
            return view('backend.Advising.view_student',$data);
    
        
    }

    public function advisingAdd($student_id){

                $data['years'] = StudentYear::all();
                $data['classes'] = StudentClass::all();
                $data['departments'] = Department::all();
                $data['subjects'] = Subject::all();


        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

        return view('backend.Advising.add_course',$data);
    }

    public function advisingStore(Request $request,$student_id){

        $counter=count($request->subject_id);

        if($counter !=NULL){

            for($i=0;$i<$counter;$i++){

                $addSubject = new Advising();

                $addSubject->student_id= $request->student_id;
                $addSubject->class_id=$request->class_id;
                $addSubject->subject_id=$request->subject_id[$i];
                $addSubject->department_id=$request->department_id;
                $addSubject->year_id=$request->year_id;
                $addSubject->save();


            }
        }

        $notification= array(
            'message' =>'Advising Made successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('advising.view')->with($notification);
    }

    public function AdvisingDrop($student_id){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['departments'] = Department::all();
        $data['subjects'] = Subject::all();


        $data['editData'] = AssignStudent::with(['student','discount','group','student_class'])->where('student_id',$student_id)->first();
        $data['getData'] = Advising::where('student_id',$student_id)->get();


    }

    
}

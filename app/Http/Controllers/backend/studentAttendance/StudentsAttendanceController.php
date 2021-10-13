<?php

namespace App\Http\Controllers\backend\studentAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\Department;
use App\Models\AssignStudent;
use App\Models\FeeAmountCategory;
use App\Models\Payment;
use App\Models\Advising;
use App\Models\DiscuntStudent;
use App\Models\User;
use App\Models\InstallmentDate;
use App\Models\Subject;
use App\Models\StudentAttendance;
use DB;
use Auth;
use PDF;



class StudentsAttendanceController extends Controller
{
    public function AttendanceView(){
        $data['allData'] = StudentAttendance::select('subject_id','date')->groupBy('subject_id','date')->orderBy('id','DESC')->get();
    	
        
        // $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
    	return view('backend.studentAttendence.student_attendance_view',$data);

    }

    public function AttendanceFind(){

        $data['years']= StudentYear::all();
        $data['subjects']= Subject::all();


    	return view('backend.studentAttendence.find_student',$data);
    }

    public function AttendanceAdd(Request $request){
        $year_id=$request->year_id;
        $subject_id=$request->subject_id;

        $data['students']=Advising::where('year_id',$year_id)->where('subject_id',$subject_id)->get();
        return view('backend.studentAttendence.student_attendance_add',$data);
    }

    public function AttendanceStore(Request $request){

        StudentAttendance::where('date', date('Y-m-d', strtotime($request->date)))->where('subject_id',$request->subject_id[0])->delete();

    	$countstudent = count($request->student_id);
    	for ($i=0; $i <$countstudent ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new StudentAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->student_id = $request->student_id[$i];
    		$attend->attend_status = $request->$attend_status;
            $attend->year_id = $request->year_id[$i];
            $attend->subject_id = $request->subject_id[$i];
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Student Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('attendence.view')->with($notification);
    }

    public function AttendanceEdit($subject_id){

        $year_id = DB::table('student_years')
        ->orderBy('id', 'desc')
        ->first();
       
        $editData = DB::table('student_attendances')->where('subject_id',$subject_id)->get();
        $date = DB::table('student_attendances')->select('date')->where('subject_id',$subject_id)->first();


        //dd($date);
        //$result = (array) json_decode($data);
        
        
    	
        return view('backend.studentAttendence.student_attendance_edit',compact('editData','date'));
    }

    public function AttendanceDetails($subject_id,$date){

        $data['details'] = StudentAttendance::where('subject_id',$subject_id)->where('date',$date)->get();
        
    	return view('backend.studentAttendence.details',$data);
    }

    public function StudentAttendanceView(){

        $id=Auth::user()->id;
        //dd($id);
        $year=AssignStudent::select('year_id')->where('student_id',$id)->get();
        //dd($year_id->toArray());
        //$subject_id=DB:: table('advisings')->where('student_id',$id)->where('year_id',$year)->value('subject_id');


        //$data['details'] = Advising::where('student_id',$id)->where('year_id',$year)->all();

        $subjects= StudentAttendance::select('subject_id')->groupBy('subject_id')
        ->orderBy('id','DESC')->get();

        return view('backend.studentAttendence.studentView.attendence_search',compact('subjects','year'));
        
    }
}

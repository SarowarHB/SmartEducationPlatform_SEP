<?php

namespace App\Http\Controllers\backend\teachers;

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
use App\Models\TeachersCourse;
use DB;
use Auth;
use PDF;


class TeachersCourseController extends Controller
{
    public function TeachersView(){

        $data['teachers']=User::where('role','Teacher')->get();
        // dd($data);
        return view('backend.teachers.teachersCourse.view_teacher', $data);
    }

    public function TeachersCourseAdd($id) {

        $data['teachers']=User::where('id', $id)->first();

        $data['subjects']=Subject::all();

        $data['year_id']=StudentYear::orderBy('id','desc')->first();
        

        return view('backend.teachers.teachersCourse.add_course', $data);

    }

    public function TeachersCourseStore(Request $request, $id){

        $teacher_id=$request->id;
        $year_id=$request->year_id;

        $counter=count($request->subject_id);

        if($counter !=NULL){

            for($i=0;$i<$counter;$i++){

                $addSubject = new TeachersCourse();

                $addSubject->teacher_id= $teacher_id;
                $addSubject->subject_id=$request->subject_id[$i];
                $addSubject->year_id=$year_id;
                $addSubject->save();


            }
        }

        $notification= array(
            'message' =>'Add Course successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('teachers.view')->with($notification);
    }

    public function TeachersCourseDetails($id) {

        $year=StudentYear::select('id')->orderBy('id','desc')->first();
        $year_id=$year->id;
        //dd($year_id);

        $data['teacher']=TeachersCourse::where('teacher_id',$id)->where('year_id',$year_id)->get();
        // dd($teacher_id->toArray());


        return view('backend.teachers.teachersCourse.view_courses', $data);
    }
}

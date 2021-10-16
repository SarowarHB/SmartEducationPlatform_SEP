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
use App\Models\CourseSheet;
use DB;
use Auth;
use PDF;
use Image;


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

    public function CourseView(){
        $id=Auth::user()->id;
        $year=StudentYear::select('id')->orderBy('id','desc')->first();
        $year_id=$year->id;

        $data['courses'] = TeachersCourse::where('teacher_id',$id)->where('year_id',$year_id)->get();

        return view('backend.teachers.lectureSheet.viewSubjects', $data);


    }

    public function LectureAdd($subject_id) {
       
       
       $data['subjects'] = Subject::where('id',$subject_id)->first();

        return view('backend.teachers.lectureSheet.add_lecture', $data);
    }

    public function LectureStore(Request $request,$subject_id){
   
                $addLecture = new CourseSheet();

                $addLecture->teacher_id= $id;
                $addLecture->lecture_name=$request->lecture_name;
                $addLecture->year_id=$year_id;
                $addLecture->subject_id=$subject_id;

                  $file = $request->file('file');
                    //dd($file);

                    $filename = date('YmdHi').$file->getClientOriginalName();
                    
                    $file->move(public_path('upload/lectureSheet'),$filename);
                    $addLecture['file'] = $filename;

                $addLecture->save();       

        $notification= array(
            'message' =>'Add Lecture successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('course.view')->with($notification);


    }

    public function LectureDetails($subject_id){

        $id=Auth::user()->id;
        $year=StudentYear::select('id')->orderBy('id','desc')->first();
        $year_id=$year->id;

        $data['lectures'] = CourseSheet::where('teacher_id',$id)
        ->where('year_id',$year_id)
        ->where('subject_id',$subject_id)
        ->get();
    

        return view('backend.teachers.lectureSheet.view_lectures', $data);
    }

    public function LectureView($id){

        $data=CourseSheet::find($id);
        //dd($data->toArray());
        return view('backend.teachers.lectureSheet.students_details_pdf',compact('data'));

    }
}

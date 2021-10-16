<?php

namespace App\Http\Controllers\backend\student;

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

class ClasssheetController extends Controller
{
    public function StudentCourseView(){
        $id=Auth::user()->id;
        //dd($id);
        $year=AssignStudent::where('student_id',$id)->first();
        $year_id=$year->year_id;
        //dd($data);
        $data['courses']=Advising::select('subject_id')
        ->where('student_id',$id)->where('year_id',$year_id)->orderBy('subject_id')->get();
        //dd($subjects->toArray());

        return view('backend.teachers.lectureSheet.student.viewsubject', $data);

    }
    public function StudentLectureDetails($subject_id){
        $id=Auth::user()->id;
        //dd($id);
        $year=AssignStudent::where('student_id',$id)->first();
        $year_id=$year->year_id;
        //dd($data);
        $data['lectures']=CourseSheet::where('subject_id',$subject_id)
        ->where('year_id',$year_id)->get();
        //dd($data);

        return view('backend.teachers.lectureSheet.student.view_lectures', $data);

    }
    public function StudentLectureView($id){
        $data=CourseSheet::find($id);
        //dd($data->toArray());
        return view('backend.teachers.lectureSheet.students_details_pdf',compact('data'));

    }
}

<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Department;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscuntStudent;
use DB;


class StudentRegController extends Controller
{
    public function StudentRegView(){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();

    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
    
    	$data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    	

        return view('backend.studentManagent.student_reg.student_view',$data);
    }

    public function StudentRegAdd(){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['departments'] = Department::all();
    	return view('backend.studentManagent.student_reg.student_add',$data);
      
    	 
    }

    public function StudentRegStore(Request $request){

        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->year;
            $student = User::where('usertype','Student')->orderBy('id','DESC')->first();
    
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            }else{
         $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
             $studentId = $student+1;
             if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
    
            } // end else 
    
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
    
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
             $user->save();
    
              $assign_student = new AssignStudent();
              $assign_student->student_id = $user->id;
              $assign_student->year_id = $request->year_id;
              $assign_student->class_id = $request->class_id;
              $assign_student->department_id = $request->department_id;
              $assign_student->save();
    
              $discount_student = new DiscuntStudent();
              $discount_student->assign_student_id = $assign_student->id;
              $discount_student->fee_category_id = '1';
              $discount_student->discount = $request->discount;
              $discount_student->save();
    
            });
    
    
            $notification = array(
                'message' => 'Student Registration Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.registration.view')->with($notification);
    
        } // End Method 
    
 }

<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ExamTypeController extends Controller
{
    public function examTypeView(){
        $data=ExamType::all();
        return view('backend.examManage.view_examType',compact('data'));
    }

    public function examTypeAdd(){
        return view('backend.examManage.add_examType');
    }

    public function examTypeStore(Request $request){
        $validatedData= $request->validate([
            "examName"=>'required|unique:exam_types,examName',
        ]);

        ExamType::insert([

            "examName"=>$request->examName,
            "created_at"=>Carbon::now()

        ]);

        $notification= array(
            'message' =>'Exam Type Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('examType.view')->with($notification);
    }

    public function examTypeEdit($id) {
        $data = ExamType::find($id);
        return view('backend.examManage.edit_examType',compact('data'));
    }

    public function examTypeUpdate(Request $request, $id) {

        ExamType::find($id)->update([

            "examName"=>$request->examName,
            "created_at"=>Carbon::now()
        ]);

        $notification= array(
            'message' =>'Exam Type Updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('examType.view')->with($notification);
    }

    public function examTypeDelete($id) {
    
        ExamType::find($id)->delete();

        $notification= array(
            'message' =>'Exam Type Delected successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('examType.view')->with($notification);

    }
}

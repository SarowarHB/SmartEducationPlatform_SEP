<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Department;



class SubjectController extends Controller
{
    public function subjectView(){

        $data=Subject::all();
        return view('backend.subject.view_subject',compact('data'));

    }

    public function subjectAdd(){
        $department=Department::all();
        return view('backend.subject.add_subject',compact('department'));
    }

    public function subjectStore(Request $request){

        $counter=count($request->department_id);

        if($counter !=NULL){

            for($i=0;$i<$counter;$i++){

                $feeAmount = new Subject();

                $feeAmount->department_id= $request->department_id[$i];
                $feeAmount->subjectName=$request->subjectName[$i];
                $feeAmount->subjectCode=$request->subjectCode[$i];
                $feeAmount->credit=$request->credit[$i];
                $feeAmount->save();


            }
        }

        $notification= array(
            'message' =>'Subject Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('subject.view')->with($notification);
    }

    public function subjectEdit($id){

        $department=Department::all();
        $data=Subject::where('id',$id)->get();
        return view('backend.subject.edit_subject',compact('department','data'));

    }

    public function subjectUpdate(Request $request, $id){

        Subject::where('id',$id)->delete();

        $feeAmount = new Subject();

        $feeAmount->department_id= $request->department_id['0'];
        $feeAmount->subjectName=$request->subjectName['0'];
        $feeAmount->subjectCode=$request->subjectCode['0'];
        $feeAmount->credit=$request->credit['0'];
        $feeAmount->save();

        $notification= array(
            'message' =>'Subject Updated successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('subject.view')->with($notification);

    }

    public function subjectDelete($id){

        Subject::where('id',$id)->delete();

        $notification= array(
            'message' =>'Subject Delete successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('subject.view')->with($notification);

    }
}

<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
        $data['data'] = AssignSubject::all();
        $data['data'] = AssignSubject::select('department_id')->groupBy('department_id')->get();

        return view('backend.assignSubject.view_assignSubject',$data);

    }

   public function AssignSubjectAdd(){

    $data['subjects'] = Subject::all();
    	$data['department'] = Department::all();
    
    return view('backend.assignSubject.add_assignSubject',$data);
   }
   
   public function AssignSubjectStore(Request $request) {

    $subjectCount = count($request->subject_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_subject = new AssignSubject();
	    			$assign_subject->department_id = $request->department_id;
	    			$assign_subject->subject_id = $request->subject_id[$i];
	    			$assign_subject->full_mark = $request->full_mark[$i];
	    			$assign_subject->pass_mark = $request->pass_mark[$i];
	    			$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_subject->save();
                    

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Subject Assign Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.subject.view')->with($notification);

   }

   public function AssignSubjectEdit($department_id) {
        $data['editData'] = AssignSubject::where('department_id',$department_id)->orderBy('subject_id','asc')->get();
    
        $data['subjects'] = Subject::all();
        $data['departments'] = Department::all();

        return view('backend.assignSubject.edit_assignSubject',$data);


   }

   public function AssignSubjectUpdate(Request $request,$department_id){

    if ($request->subject_id == NULL) {
       
        $notification = array(
    		'message' => 'Sorry You do not select any Subject',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.subject.edit',$department_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->subject_id);
	AssignSubject::where('department_id',$department_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_subject = new AssignSubject();
                $assign_subject->department_id = $request->department_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.subject.view')->with($notification);
    } // end Method
    
    
    public function AssignSubjectDetails($department_id){
        $data['detailsData'] = AssignSubject::where('department_id',$department_id)->orderBy('subject_id','asc')->get();

        return view('backend.assignSubject.details_assignSubject',$data);
    }

   
}

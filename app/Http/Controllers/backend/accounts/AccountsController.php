<?php

namespace App\Http\Controllers\backend\accounts;

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
use App\Models\User;
use DB;
use Auth;

class AccountsController extends Controller
{
    public function RegFeeView(){
        $dep = Department::all();
        
        //$data['years'] = StudentYear::orderBy('id','desc')->get();

        $years = DB::table('student_years')
        ->orderBy('id', 'desc')
        ->first();

    	return view('backend.accounts.add_registrationFee',compact('dep','years'));
        
    }

    public function RegFeeAdd(Request $request)
    {
        $department_id = $request->id;
        
    	$id_no = $request->id_no;
      
        $year_id= $request->year_id;

        $std_id = DB::table('users')->where('id_no', $id_no)->value('id');

        $class_id = DB::table('assign_students')->where('student_id', $std_id)->value('class_id');
        //dd($class_id);

        $editData= AssignStudent::with(['student','student_class','student_year','group'])
        ->where('student_id',$std_id)->first();
         //dd($editData);
        

        $amounts = DB::table('fee_amount_categories')->where('department_id',$department_id)
        ->where('class_id',$class_id)
        ->value('amount');
        
        
        

        return view('backend.accounts.enter_regFee',compact('editData','amounts','std_id','id_no','year_id','class_id','department_id'));
   

    }

    public function RegFeeStore(Request $request){

    
        $student_id=$request->student_id;
        $id_no=$request->id_no;
        $year_id=$request->year_id;
        $class_id=$request->class_id;
        $department_id=$request->department_id;
        $amount=$request->amount;



        if($amount !=NULL){
            $addPayment = new Payment();

            $addPayment->student_id = $student_id;
            $addPayment->id_no = $id_no;
            $addPayment->year_id = $year_id;
            $addPayment->class_id = $class_id;
            $addPayment->department_id = $department_id;
            $addPayment->fee_category_id = 1;
            $addPayment->amount = $amount;
            $addPayment->save();

            $notification= array(
                'message' =>'Registration Fee Successfully Added',
                'alert-type'=>'success'
            );
           
            return Redirect()->route('registration.fee.view')->with($notification);
        }
        else{
            $notification= array(
                'message' =>'Do Not Add any Amount !!!',
                'alert-type'=>'error'
            );
           
            return Redirect()->route('registration.fee.add')->with($notification);
        }


    }

    public function semesterFeeView(){

        $dep = Department::all();
        
        //$data['years'] = StudentYear::orderBy('id','desc')->get();

        $years = DB::table('student_years')
        ->orderBy('id', 'desc')
        ->first();

    	return view('backend.accounts.semesterFee.add_semesterFee',compact('dep','years'));      

    }

    public function semesterFeeAdd(Request $request){

        $department_id = $request->id;
    	$id_no = $request->id_no;
        $year_id= $request->year_id;

        $std_id = DB::table('users')->where('id_no', $id_no)->value('id');
        $class_id = DB::table('assign_students')->where('student_id', $std_id)->value('class_id');
        //dd($class_id);

        $editData= AssignStudent::with(['student','student_class','student_year','group'])
        ->where('student_id',$std_id)->first();
       


         $studentData= Advising::with(['subject'])
         ->where('student_id',$std_id)
         ->where('year_id',$year_id)
         ->where('department_id',$department_id)
         ->where('class_id',$class_id)->get();
        //dd($editData->toArray());
        

        $amounts = DB::table('fee_amount_categories')->where('department_id',$department_id)
        ->where('class_id',$class_id)->where('fee_category_id','2')
        ->value('amount');
        //dd($amounts);

        $paymentamount = DB::table('payments')
        ->where('student_id',$std_id)
        ->where('year_id',$year_id)
        ->where('department_id',$department_id)
        ->where('class_id',$class_id)
        ->where('fee_category_id','2')
        ->get();
        
        
        

        return view('backend.accounts.semesterFee.enter_semesterFee',
        compact('editData','amounts','std_id','id_no','year_id','class_id','department_id','studentData','paymentamount'));
    }

    public function semesterStore(Request $request){

        $student_id=$request->student_id;
        $id_no=$request->id_no;
        $year_id=$request->year_id;
        $class_id=$request->class_id;
        $department_id=$request->department_id;
        $amount=$request->amount;



        if($amount !=NULL){
            $addPayment = new Payment();

            $addPayment->student_id = $student_id;
            $addPayment->id_no = $id_no;
            $addPayment->year_id = $year_id;
            $addPayment->class_id = $class_id;
            $addPayment->department_id = $department_id;
            $addPayment->fee_category_id = 2;
            $addPayment->amount = $amount;
            $addPayment->save();

            $notification= array(
                'message' =>'Semister Fee Successfully Added',
                'alert-type'=>'success'
            );
           
            return Redirect()->route('semester.fee.view')->with($notification);
        }
        else{
            $notification= array(
                'message' =>'Do Not Add any Amount !!!',
                'alert-type'=>'error'
            );
           
            return Redirect()->route('semester.fee.add')->with($notification);
        }

    }



    public function paymentView(){
        $dep = Department::all();
        
        //$data['years'] = StudentYear::orderBy('id','desc')->get();

        $years = DB::table('student_years')
        ->orderBy('id', 'asc')
        ->first();

    	return view('backend.accounts.ViewPayment.searchPayment',compact('dep','years'));
     
    }

    public function paymentDetilesView(Request $request){


        $department_id = $request->id;
    	$id_no = $request->id_no;
        $year_id= $request->year_id;

        $std_id = DB::table('users')->where('id_no', $id_no)->value('id');
        $class_id = DB::table('assign_students')->where('student_id', $std_id)->value('class_id');
        //dd($class_id);

        $editData= AssignStudent::with(['student','student_class','student_year','group'])
        ->where('student_id',$std_id)->first();
       


         $studentData= Advising::with(['subject'])
         ->where('student_id',$std_id)
         ->where('year_id',$year_id)
         ->where('department_id',$department_id)
         ->where('class_id',$class_id)->get();
        //dd($editData->toArray());
        
        $data = Payment::select('year_id')->groupBy('year_id')
        ->where('student_id',$std_id)->where('fee_category_id','2')->get();
        //dd($data->toArray());

        $amounts = DB::table('fee_amount_categories')->where('department_id',$department_id)
        ->where('class_id',$class_id)->where('fee_category_id','2')
        ->value('amount');
        //dd($amounts);

        $paymentamount = DB::table('payments')
        ->where('student_id',$std_id)
        ->where('department_id',$department_id)
        ->where('class_id',$class_id)
        ->where('fee_category_id','2')
        ->get();
        
        
        

        return view('backend.accounts.ViewPayment.viewPayment',
        compact('editData','amounts','std_id','id_no','year_id','class_id','department_id','studentData','paymentamount','data'));

    }
}

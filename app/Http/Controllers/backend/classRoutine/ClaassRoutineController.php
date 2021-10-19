<?php

namespace App\Http\Controllers\backend\classRoutine;

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
use App\Models\ClassRoutine;
use DB;
use PDF;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Carbon;


class ClaassRoutineController extends Controller
{
    public function AllRoutineView(){

        $year = DB::table('student_years')
        ->orderBy('id', 'desc')
        ->first();
        $year_id=$year->id;
        //dd($year_id);

        $data['class_routines'] = ClassRoutine::where('year_id',$year_id)->get();
        //dd($data);

        return view('backend.classRoutine.adminControl.view_allClassRoutine',$data);
    }

    public function RoutineAdd(){
        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
        $data['all_departments'] = Department::all();
        return view('backend.classRoutine.adminControl.addNewRoutine',$data);
    }

    public function StudentRoutineStore(Request $request){

        $data=new ClassRoutine();

        $data->class_id=$request->class_id;
        $data->department_id=$request->dep_id;
        $data->year_id=$request->year_id;
        
        $file = $request->file('file');
                    //dd($file);

                    $filename = date('YmdHi').$file->getClientOriginalName();
                    
                    $file->move(public_path('upload/classRoutine'),$filename);
                    $data['file'] = $filename;

        $data->save();       

        $notification= array(
            'message' =>'Add Class Routine successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('class.routine.view')->with($notification);

    }

    public function ClassRoutineEdit($id){

        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
        $data['all_departments'] = Department::all();
        
        $data['alldata'] = ClassRoutine::find($id);
        return view('backend.classRoutine.adminControl.editRoutine',$data);
    }

    public function StudentRoutineUpdate(Request $request, $id){


        if ($request->file == NULL) {
       
            $notification = array(
                'message' => 'Sorry You do not select any File',
                'alert-type' => 'error'
            );
    
            return redirect()->route('class.routine.view')->with($notification);
                 
            }else{

                $file = $request->file('file');
                @unlink(public_path('upload/classRoutine/'.$data->image));
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/classRoutine'),$filename);

                ClassRoutine::find($id)->update([

                    'class_id' =>  $request->class_id,
                    'department_id'=>$request->dep_id,
                    'year_id'=>$request->year_id,
                    'file'=>$filename,
                    'created_at'=>Carbon::now()
        
                ]);
                 
                $notification= array(
                    'message' =>'Routine Updated successfully',
                    'alert-type'=>'success'
                );
               
                return Redirect()->route('class.routine.view')->with($notification);
            }

    }

    public function RoutineView() {

        $id=Auth::user()->id;
        //dd($id);
        $year=AssignStudent::where('student_id',$id)->first();
        $year_id=$year->year_id;
        //dd($year_id);
        $department_id=$year->department_id;
        //dd($department_id);
        $class_id=$year->class_id;
        //dd($class_id);

        $data['alldata']=ClassRoutine::where('class_id',$class_id)
        ->where('department_id',$department_id)
        ->where('year_id',$year_id)->first() ;

        //dd($data);
        return view('backend.classRoutine.studentSection.viewRoutine',$data);
    }
}

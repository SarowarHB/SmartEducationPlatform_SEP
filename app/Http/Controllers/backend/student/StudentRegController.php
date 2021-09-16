<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function RegView(){
        return view('backend.studentManagent.student_reg.student_view');
    }
}

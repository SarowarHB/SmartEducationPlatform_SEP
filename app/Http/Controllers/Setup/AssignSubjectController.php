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
        $data=AssignSubject::all();

        return view('backend.assignSubject.view_assignSubject',compact('data'));

    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $data=User::find($id);

        return view('backend.user.view_profile',compact('data'));
    }
}


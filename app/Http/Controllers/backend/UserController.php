<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    public function UserView(){
        $datas=User::all();
        return view('backend.user.view_user',compact('datas'));

    }
    //
}

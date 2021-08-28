<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    //
}

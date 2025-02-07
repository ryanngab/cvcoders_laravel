<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login.index');
    }
    public function register()
    {
        return view('login.register');
    }
    public function reset()
    {
        return view('login.reset');
    }
    public function forget()
    {
        return view('login.forget');
    }
    

}

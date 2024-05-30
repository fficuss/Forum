<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function showsignin()
    {
        return view('signin');
    }

    public function showreg()
    {
        return view('register');
    }
}


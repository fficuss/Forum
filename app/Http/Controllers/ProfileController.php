<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showprofile()
    {
        return view('profile');
    }
    public function showeditprofile()
    {
        return view('editprofile');
    }
}

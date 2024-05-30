<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function showmesseges()
    {
        return view('messenger');
    }
}

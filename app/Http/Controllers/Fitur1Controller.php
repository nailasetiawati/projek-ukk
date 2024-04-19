<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Fitur1Controller extends Controller
{
    public function index()
    {
        return view('contents.fitur1.index');
    }
}

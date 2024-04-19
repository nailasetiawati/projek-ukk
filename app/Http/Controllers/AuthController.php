<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('contents.auth.login', compact('title'));
    }

    

    public function register()
    {
        return view('contents.auth.register');
    }


}

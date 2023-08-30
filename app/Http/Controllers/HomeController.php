<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {

        return view('home');
    }

    function login()
    {
        return view('/login');
    }

    function panduan()
    {
        return view('/panduan');
    }
    function tanyakan()
    {
        return view('/tanyakan');
    }
}

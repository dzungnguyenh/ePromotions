<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
    * Constructer check middleware
    *
    * @return mixed
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Index
    *
    * @return home page
    */
    public function index()
    {
        return view('layouts.template_admin');
    }
}

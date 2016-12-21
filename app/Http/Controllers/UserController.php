<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class UserController extends Controller
{

    /**
     * Call get to logout
     *
     * @return void Redirect to homepage
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}

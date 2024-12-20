<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as RoutingController;

class LoginController extends RoutingController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
}

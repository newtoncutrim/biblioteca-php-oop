<?php

namespace App\Controllers\Auth;

use App\HTTP\Request;

class LoginController
{
    public function index()
    {
       require_once __DIR__ . '/../../Views/LoginView.php';
    }

    public function login(Request $request)
    {
        dd('login', $request->all());
    }

    public function logout()
    {    
    }
}
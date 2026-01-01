<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.admin.login.index');
    }
}

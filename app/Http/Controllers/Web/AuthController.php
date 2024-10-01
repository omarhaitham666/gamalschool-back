<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function login(): View
    {
        return view('dashboard.login');
    }
}
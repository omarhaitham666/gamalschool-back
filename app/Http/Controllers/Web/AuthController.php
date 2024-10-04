<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function login(Request $request): View
    {
       

        return view('dashboard.login');
    }

    public function handle_login(Request $request)
    {
        $request->validate([
            
            'useremail'=>'required|email:rfc,dns|exists:users,email',
            'userpassword'=>'required|string|min:8'
        ]);

        if(Auth::attempt(['email'=>$request->useremail,'password'=>$request->userpassword])){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/Team/all');
        }
        return back()->with('error','password is not match');
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>['required','min:3','max:255','string'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:8'],
        ]);
        

        $user=User::create($fields);
        
        $token=$user->createToken($request->name);
        return[
            'user'=>$user,
            'token'=>$token->plainTextToken,
        ];
        
    }

    public function login(Request $request){
        $fields=$request->validate([
            
            'email'=>['required','email','exists:users'],
            'password'=>['required'],
        ]);
        $user=User::where('email',$request->email)->first();

        if(!$user  || !Hash::check($request->password,$user->password)){
            return[
                'status'=>false,
                'errors' =>[
                    'email'=>[
                        'كلمة المرور غير مطابقة للبريد الالكتروني'
                    ]
                ] 
            ];
        }


        $token=$user->createToken($user->name);
        
        return[
            'status'=>true,
            'user'=>$user,
            'token'=>$token->plainTextToken,
        ];
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return[
            'message'=>'لقد سجلت خروج'
        ];
    }


}


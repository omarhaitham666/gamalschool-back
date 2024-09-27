<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return response()->json([
            'results'=>$users
        ],200);
    }

    public function show($id){
        $users=User::find($id);


        if(!$users){
            return response()->json([
                'message'=>'user not found'
            ],404);
        }
        return response()->json([
            'users'=>$users
        ]);
    }

}

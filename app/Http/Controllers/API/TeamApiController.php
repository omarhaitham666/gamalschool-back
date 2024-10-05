<?php
namespace App\Http\Controllers\API;

// namespace App\Http\Controllers\API;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class TeamApiController extends Controller
// {
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
        
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
    


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamApiController extends Controller // ichange class name to match file name
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Teams = Team::all();
        return response()->json($Teams);
    }
}




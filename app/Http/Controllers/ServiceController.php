<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.FullName' => 'required|string|min:3|max:80',
            'data.Email' => 'required|string|email|min:15',
            'data.phone' => 'required|string|regex:/^[0-9]{11}$/',
            'data.phone2' => 'required|string|regex:/^[0-9]{11}$/',
            'data.selectgrd' => 'required|string',
            'type' => 'required|string',
        ]);
    

        $service = Service::create([
            'data' => $validatedData['data'], 
            'type' => $validatedData['type'], 
        ]);
    
        return response()->json($service, 201);
    }

    
    public function index()
    {
        
        return Service::all();
    }

   
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validatedData = $request->validate([
            'data' => 'required|array',
            'type' => 'required|string',
        ]);

        
        $service->update([
            'data' => $validatedData['data'],
            'type' => $validatedData['type'], 
        ]);

        return response()->json($service);
    }

    
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(null, 204);
    }
}

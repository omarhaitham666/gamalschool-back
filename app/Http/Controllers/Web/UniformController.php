<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class UniformController extends Controller
{
     public function index()
    {
        
        $uniformServices = Service::where('type', 'uniform')->get();

        
        return view('Uniform.index', compact('uniformServices'));
    }


    public function destroy($id)
    {
        $service = Service::where('type', 'uniform')->findOrFail($id);
        $service->delete();

        return redirect()->route('Uniform.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}

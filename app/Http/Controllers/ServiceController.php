<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // تخزين البيانات
    public function store(Request $request)
    {
        // تحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.FullName' => 'required|string|min:3|max:80',
            'data.Email' => 'required|string|email|min:15',
            'data.phone' => 'required|string|regex:/^[0-9]{11}$/',
            'data.phone2' => 'required|string|regex:/^[0-9]{11}$/',
            'data.selectgrd' => 'required|string',
            'type' => 'required|string',
        ]);
    
        // إنشاء خدمة جديدة مع تعيين البيانات والنوع
        $service = Service::create([
            'data' => $validatedData['data'], // تخزين البيانات في عمود 'data'
            'type' => $validatedData['type'], // تعيين النوع
        ]);
    
        return response()->json($service, 201);
    }

    // استرجاع جميع البيانات
    public function index()
    {
        // إرجاع جميع الخدمات مع نوعها
        return Service::all();
    }

    // تحديث البيانات
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validatedData = $request->validate([
            'data' => 'required|array',
            'type' => 'required|string',
        ]);

        // تحديث البيانات مع الحفاظ على البيانات الأخرى
        $service->update([
            'data' => $validatedData['data'],
            'type' => $validatedData['type'], // تحديث النوع إذا لزم الأمر
        ]);

        return response()->json($service);
    }

    // حذف البيانات
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(null, 204);
    }
}

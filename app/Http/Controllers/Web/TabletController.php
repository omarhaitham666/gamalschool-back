<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    //
    public function index()
    {
        // جلب جميع الخدمات من نوع 'tablet'
        $tabletServices = Service::where('type', 'tablet')->get();

        // تمرير البيانات إلى العرض
        return view('Tablet.index', compact('tabletServices'));
    }


    public function destroy($id)
    {
        $service = Service::where('type', 'tablet')->findOrFail($id);
        $service->delete();

        return redirect()->route('Tablet.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}




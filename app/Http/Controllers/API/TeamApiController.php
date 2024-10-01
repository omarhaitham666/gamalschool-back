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

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // التحقق من صحة البيانات
    //     $request->validate([
    //         'name' => 'required|min:3|max:20|string|alpha:ascii',
    //         'title' => 'required|min:3|max:30|string',
    //         'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // تحضير البيانات للتخزين
    //     $data = [
    //         'name' => $request->name,
    //         'title' => $request->title,
    //     ];

    //     // التحقق من وجود صورة ورفعها
    //     if ($request->hasFile('pic')) {
    //         $file = $request->file('pic');

    //         if ($file->isValid()) {
    //             // الحصول على امتداد الملف
    //             $ext = $file->getClientOriginalExtension();

    //             // تعريف نوع الكائن
    //             $object = 'team';

    //             // توليد اسم فريد للملف
    //             $name = $object . '_' . uniqid() . '.' . $ext;

    //             // تحديد مسار التخزين
    //             $filePath = "uploads/$object/" . $name;

    //             // تخزين الملف على القرص 'public'
    //             $path = $file->storeAs("uploads/$object", $name, 'public');

    //             // حفظ مسار الصورة في البيانات
    //             $data['pic'] = $path;
    //         }
    //     }

    //     // إنشاء السجل في قاعدة البيانات
    //     $team = Team::create($data);

    //     return response()->json(['message' => 'تم إنشاء الفريق بنجاح!', 'team' => $team], 201);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Team $team)
    // {
    //     return response()->json($team);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Team $team)
    // {
    //     // التحقق من صحة البيانات
    //     $request->validate([
    //         'name' => 'required|min:3|max:20|string|alpha:ascii',
    //         'title' => 'required|min:3|max:30|string',
    //         'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // تحضير البيانات للتحديث
    //     $data = [
    //         'name' => $request->name,
    //         'title' => $request->title,
    //     ];

    //     // التحقق من وجود صورة جديدة ورفعها
    //     if ($request->hasFile('pic')) {
    //         $file = $request->file('pic');

    //         if ($file->isValid()) {
    //             // حذف الصورة القديمة إذا كانت موجودة
    //             if ($team->pic && Storage::disk('public')->exists($team->pic)) {
    //                 Storage::disk('public')->delete($team->pic);
    //             }

    //             // الحصول على امتداد الملف
    //             $ext = $file->getClientOriginalExtension();

    //             // تعريف نوع الكائن
    //             $object = 'team';

    //             // توليد اسم فريد للملف
    //             $name = $object . '_' . uniqid() . '.' . $ext;

    //             // تحديد مسار التخزين
    //             $filePath = "uploads/$object/" . $name;

    //             // تخزين الملف على القرص 'public'
    //             $path = $file->storeAs("uploads/$object", $name, 'public');

    //             // حفظ مسار الصورة في البيانات
    //             $data['pic'] = $path;
    //         }
    //     }

    //     // تحديث السجل في قاعدة البيانات
    //     $team->update($data);

    //     return response()->json(['message' => 'تم تحديث الفريق بنجاح!', 'team' => $team], 200);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Team $team)
    // {
    //     // حذف الصورة إذا كانت موجودة
    //     if ($team->pic && Storage::disk('public')->exists($team->pic)) {
    //         Storage::disk('public')->delete($team->pic);
    //     }

    //     // حذف السجل من قاعدة البيانات
    //     $team->delete();

    //     return response()->json(['message' => 'تم حذف الفريق بنجاح!'], 200);
    // }
}




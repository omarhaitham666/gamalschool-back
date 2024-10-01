<?php
 namespace App\Http\Controllers\Web;
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use App\Models\Achievement;
 use Illuminate\Support\Facades\Storage;
 
 class AchievementController extends Controller
 {
     /**
      * Display a listing of the resource.
      */
     public function index()
     {
         $Achievements = Achievement::all();
         return view('Achievement.index', compact('Achievements'));
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('Achievement.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         // التحقق من صحة البيانات
         $request->validate([
             'name' => 'required|min:3|max:20|string|alpha:ascii',
             'title' => 'required|min:3|max:30|string',
             'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
 
         // تحضير البيانات للتخزين
         $data = [
             'name' => $request->name,
             'title' => $request->title,
         ];
 
         // التحقق من وجود صورة ورفعها
         if ($request->hasFile('pic')) {
             $file = $request->file('pic');
 
             if ($file->isValid()) {
                 // الحصول على امتداد الملف
                 $ext = $file->getClientOriginalExtension();
 
                 // تعريف نوع الكائن (يمكنك تخصيص هذا حسب الحاجة)
                 $object = 'Achievement'; // يمكن أن يكون 'team' أو أي مجلد آخر
 
                 // توليد اسم فريد للملف
                 $name = $object . '_' . uniqid() . '.' . $ext;
 
                 // تحديد مسار التخزين
                 $filePath = "uploads/$object/" . $name;
 
                 // تخزين الملف على القرص 'public'
                 $path = $file->storeAs("uploads/$object", $name, 'public');
 
                 // حفظ مسار الصورة في البيانات
                 $data['pic'] = $path;
             }
         }
 
         // إنشاء السجل في قاعدة البيانات
         Achievement::create($data);
 
         return redirect()->route('Achievement.index')->with('message', 'نجحت العملية!');
     }
 
     /**
      * Display the specified resource.
      */
     public function show(Achievement $achievement,$id)
     {
         $achievement = Achievement::findOrFail($id);
         return view('Achievement.show', compact('achievement'));
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit($id)
     {
         $achievement = Achievement::findOrFail($id);
         return view('Achievement.edit', compact('achievement'));
     }
 

 
     /**
  * Update the specified resource in storage.
  */
 public function update(Request $request,$id)
 {
    $Achievement = Achievement::findOrFail($id);
     
     // التحقق من صحة البيانات
     $request->validate([
         'name' => 'required|min:3|max:20|string|alpha:ascii',
         'title' => 'required|min:3|max:30|string',
         'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
 
     // تحضير البيانات للتحديث
     $data = [
         'name' => $request->name,
         'title' => $request->title,
     ];
 
     // التحقق من وجود صورة جديدة ورفعها
     if ($request->hasFile('pic')) {
         $file = $request->file('pic');
 
         if ($file->isValid()) {
             // الحصول على امتداد الملف
             $ext = $file->getClientOriginalExtension();
 
             // تعريف نوع الكائن
             $object = 'Achievement';
 
             // توليد اسم فريد للملف
             $name = $object . '_' . uniqid() . '.' . $ext;
 
             // تخزين الملف على القرص 'public'
             $path = $file->storeAs("uploads/$object", $name, 'public');
 
             // حذف الصورة القديمة إذا كانت موجودة
             if ($Achievement->pic && Storage::disk('public')->exists($Achievement->pic)) {
                 Storage::disk('public')->delete($Achievement->pic);
             }
 
             // حفظ مسار الصورة الجديد في البيانات
             $data['pic'] = $path;
         }
     }
 
     // تحديث السجل في قاعدة البيانات
     $Achievement->update($data);
 
     return redirect()->route('Achievement.index')->with('message', 'تم التحديث بنجاح!');
 }
 
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Achievement $Achievement,$id)
     {
         $Achievement = Achievement::findOrFail($id);
         // حذف الصورة إذا كانت موجودة
         if ($Achievement->pic && Storage::disk('public')->exists($Achievement->pic)) {
             Storage::disk('public')->delete($Achievement->pic);
         }
 
         // حذف السجل من قاعدة البيانات
         $Achievement->delete();
 
         return redirect()->route('Achievement.index')->with('message', 'تم الحذف بنجاح!');
     }
 }
 
 


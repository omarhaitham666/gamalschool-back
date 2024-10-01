<?php
 namespace App\Http\Controllers\Web;
 



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Teams = Team::all();
        return view('Team.index', compact('Teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Team.create');
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
                $object = 'team'; // يمكن أن يكون 'team' أو أي مجلد آخر

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
        Team::create($data);

        return redirect()->route('Team.index')->with('message', 'نجحت العملية!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team,$id)
    {
        $Team = Team::findOrFail($id);
        return view('Team.show', compact('Team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Team = Team::findOrFail($id);
        return view('Team.edit', compact('Team'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Team $team,$id)
    // {
    //     $Team = Team::findOrFail($id);
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

    //             // حذف الصورة القديمة إذا كانت موجودة
    //             if ($team->pic && Storage::disk('public')->exists($team->pic)) {
    //                 Storage::disk('public')->delete($team->pic);
    //             }

    //             // حفظ مسار الصورة الجديد في البيانات
    //             $data['pic'] = $path;
    //         }
    //     }

    //     // تحديث السجل في قاعدة البيانات
    //     $Team->update($data);

    //     return redirect()->route('Team.index')->with('message', 'تم التحديث بنجاح!');
    // }

    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, Team $team, $id)
{
    $Team = Team::findOrFail($id);
    
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
            $object = 'team';

            // توليد اسم فريد للملف
            $name = $object . '_' . uniqid() . '.' . $ext;

            // تخزين الملف على القرص 'public'
            $path = $file->storeAs("uploads/$object", $name, 'public');

            // حذف الصورة القديمة إذا كانت موجودة
            if ($team->pic && Storage::disk('public')->exists($team->pic)) {
                Storage::disk('public')->delete($team->pic);
            }

            // حفظ مسار الصورة الجديد في البيانات
            $data['pic'] = $path;
        }
    }

    // تحديث السجل في قاعدة البيانات
    $Team->update($data);

    return redirect()->route('Team.index')->with('message', 'تم التحديث بنجاح!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $Team,$id)
    {
        $Team = Team::findOrFail($id);
        // حذف الصورة إذا كانت موجودة
        if ($Team->pic && Storage::disk('public')->exists($Team->pic)) {
            Storage::disk('public')->delete($Team->pic);
        }

        // حذف السجل من قاعدة البيانات
        $Team->delete();

        return redirect()->route('Team.index')->with('message', 'تم الحذف بنجاح!');
    }
}


//  use App\Http\Controllers\Controller;
//  use Illuminate\Http\Request;
//  use App\Models\Team;
// use Illuminate\Support\Facades\Storage;

//  class TeamController extends Controller
//  {
//     /**
//      * Display a listing of the resource.
//      */
//      public function index()
//      {
//          //
//          $Teams = Team::all();
    
//          return view('Team.index',compact('Teams'));
//      }

//     // /**
//     //  * Show the form for creating a new resource.
//     //  */
//      public function create()
//      {
//          //
//          return view('Team.create');
//      }

    /**
     * Store a newly created resource in storage.
     */
    //  public function store(Request $request)
    //  {
    //      //
    //      $request->validate([
    //         'name'=>'required|min:3|max:20|string|alpha:ascii',
    //        'title'=>'required|min:3|max:30|string',
    //        'pic'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    //     Team::create([
    //          'name'=>$request->name,
    //         'title'=>$request->title,
    //          'pic'=>$request->pic,
    //      ]);
    //      $file = $request->file('pic');

    //      $ext = $file->getClientOriginalExtension();
    //              $name = "$Team".uniqid().".$ext";
    //              $filePath = "uploads/$Team/".$name;
    //              $path = Storage::put($filePath, file_get_contents($file));
    //      return redirect()->route('Team.index')->with('message','نجحت العملية !');
    //  }

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

    //         // التأكد من أن الملف ليس فارغًا
    //         if ($file->isValid()) {
    //             // الحصول على امتداد الملف
    //             $ext = $file->getClientOriginalExtension();

    //             // تعريف نوع الكائن (يمكنك تخصيص هذا حسب الحاجة)
    //             $object = 'team'; // تأكد من تعريف هذا المتغير أو استخدام قيمة ثابتة

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
    //     Team::create($data);

    //     return redirect()->route('Team.index')->with('message', 'نجحت العملية!');
    // }



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

    //             // تعريف نوع الكائن (يمكنك تخصيص هذا حسب الحاجة)
    //             $object = 'team'; // يمكن أن يكون 'team' أو أي مجلد آخر

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
    //     Team::create($data);

    //     return redirect()->route('Team.index')->with('message', 'نجحت العملية!');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    //     $Team=Team::find($id);
    //     return view('Team.show',compact('Team'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    //     $Team = Team::findOrFail($id);
    //     return view('Team.edit',compact('Team'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $Team = Team::findOrFail($id);
    //     //
    //     $request->validate([
    //         'name'=>'required|min:3|max:20|string|alpha:ascii',
    //         'title'=>'required|min:3|max:30|string',
    //         'pic'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $Team->update([
    //         'name'=>$request->name,
    //         'title'=>$request->title,
    //         'pic'=>$request->pic,
    //     ]);

    //     return redirect()->route('Team.index');

    // }

    /**
     * Remove the specified resource from storage.
     */
//     public function destroy(string $id)
//     {
//         //
//         $Team = Team::findOrFail($id);
//         $Team->delete();
//         return redirect()->route('Team.index')->with('message','تم الحذف بنجاح  !');

//     }
// }

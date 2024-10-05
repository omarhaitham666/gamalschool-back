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
         
         $request->validate([
             'name' => 'required|min:3|max:20|string|alpha:ascii',
             'title' => 'required|min:3|max:30|string',
             'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
 
        
         $data = [
             'name' => $request->name,
             'title' => $request->title,
         ];
 
         
         if ($request->hasFile('pic')) {
             $file = $request->file('pic');
 
             if ($file->isValid()) {
                 
                 $ext = $file->getClientOriginalExtension();
 
                 
                 $object = 'Achievement'; 
 
                
                 $name = $object . '_' . uniqid() . '.' . $ext;
 
                 
                 $filePath = "uploads/$object/" . $name;
 
                 
                 $path = $file->storeAs("uploads/$object", $name, 'public');
 
                
                 $data['pic'] = $path;
             }
         }
 
         
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
     
     
     $request->validate([
         'name' => 'required|min:3|max:20|string|alpha:ascii',
         'title' => 'required|min:3|max:30|string',
         'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
 
    
     $data = [
         'name' => $request->name,
         'title' => $request->title,
     ];
 
     
     if ($request->hasFile('pic')) {
         $file = $request->file('pic');
 
         if ($file->isValid()) {
             
             $ext = $file->getClientOriginalExtension();
 
             
             $object = 'Achievement';
 
             
             $name = $object . '_' . uniqid() . '.' . $ext;
 
             
             $path = $file->storeAs("uploads/$object", $name, 'public');
 
            
             if ($Achievement->pic && Storage::disk('public')->exists($Achievement->pic)) {
                 Storage::disk('public')->delete($Achievement->pic);
             }
 
            
             $data['pic'] = $path;
         }
     }
 
    
     $Achievement->update($data);
 
     return redirect()->route('Achievement.index')->with('message', 'تم التحديث بنجاح!');
 }
 
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Achievement $Achievement,$id)
     {
         $Achievement = Achievement::findOrFail($id);
         
         if ($Achievement->pic && Storage::disk('public')->exists($Achievement->pic)) {
             Storage::disk('public')->delete($Achievement->pic);
         }
 
         
         $Achievement->delete();
 
         return redirect()->route('Achievement.index')->with('message', 'تم الحذف بنجاح!');
     }
 }
 
 


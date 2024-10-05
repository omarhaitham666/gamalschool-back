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

                
                $object = 'team';

              
                $name = $object . '_' . uniqid() . '.' . $ext;

                
                $filePath = "uploads/$object/" . $name;

                
                $path = $file->storeAs("uploads/$object", $name, 'public');

                
                $data['pic'] = $path;
            }
        }

        
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
public function update(Request $request, Team $team, $id)
{
    $Team = Team::findOrFail($id);
    
    
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

            
            $object = 'team';

           
            $name = $object . '_' . uniqid() . '.' . $ext;

           
            $path = $file->storeAs("uploads/$object", $name, 'public');

            
            if ($team->pic && Storage::disk('public')->exists($team->pic)) {
                Storage::disk('public')->delete($team->pic);
            }

            
            $data['pic'] = $path;
        }
    }

    
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

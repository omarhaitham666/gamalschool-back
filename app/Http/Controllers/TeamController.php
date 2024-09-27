  <?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Team::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

       
        if ($request->hasFile('pic')) {
            $path = $request->file('pic')->store('images', 'public'); 
            $validated['pic'] = $path;
        }

        
        $team = Team::create($validated);

        return response()->json($team, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

       
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'pic' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        
        if ($request->hasFile('pic')) {
            
            if ($team->pic) {
                Storage::disk('public')->delete($team->pic);
            }
            $path = $request->file('pic')->store('images', 'public'); // استخدم مجلد 'images' أو أي مجلد تفضله
            $validated['pic'] = $path;
        }

        // تحديث بيانات العضو
        $team->update($validated);

        return response()->json($team, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

     
        if ($team->pic) {
            Storage::disk('public')->delete($team->pic);
        }

        
        $team->delete();

        return response()->json(['message' => 'Team member deleted'], 200);
    }
}



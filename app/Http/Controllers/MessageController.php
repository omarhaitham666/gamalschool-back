<?php
namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function index()
    {
        $messages = Message::all();
        return response()->json($messages, 200);
    }

    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => 'required|string|min:3|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'email' => 'required|email|max:255', 
            'message' => 'required|string', ]);

        
        $message = Message::create($validatedData);

       
        return response()->json($message, 201);
    }


    public function show($id)
    {
        $message = Message::findOrFail($id);
        return response()->json($message, 200);
    }

  
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id); 
        
        $validatedData = $request->validate([
            'first_name' => 'sometimes|required|string|min:3|max:20', 
            'last_name' => 'sometimes|required|string|min:3|max:20',
            'email' => 'sometimes|required|email|max:255',
            'message' => 'sometimes|required|string',
        ]);

        // تحديث الرسالة
        $message->update($validatedData);

        return response()->json($message, 200); 
    }

    
    public function destroy($id)
    {
        $message = Message::findOrFail($id); 
        $message->delete(); 

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index(){
        $messageServices=Message::all();
        return view('Message.index', compact('messageServices'));
    }


    public function show($id)
{
    $messageServices = Message::findOrFail($id);
    return view('Message.show', compact('messageServices'));
}


    public function destroy($id)
    {
        $service =Message::findOrFail($id);
        $service->delete();

        return redirect()->route('Message.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}

<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Messages';
        $data['showMenu'] = 'show'; 
        $data['activeSubMenu'] = 'active';
        $data['messages'] = Message::all();
        return view('web-page.message.index')->with($data);
    }

    public function store(REquest $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->name = $request->name;

        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->save();
        return redirect()->route('all-message')->with('success', CREATED_SUCCESSFULLY);
    }

    public function destroy($id){
        Message::where('id', $id)->delete();
        return redirect()->route('all-message')->with('success', DELETED_SUCCESSFULLY);
    }
}

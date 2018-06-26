<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show($id){
        $message = Message::find($id);
        return view("messages.show", [
            "message" => $message
        ]);
    }

    public function create(Request $request){
        $this->validate($request, [
            "message" => ["required", "max:16"]
        ]);
        return "Created";
    }
}

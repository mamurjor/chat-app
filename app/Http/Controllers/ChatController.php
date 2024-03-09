<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chat_room;

use App\Models\chart_message;

use Illuminate\Support\Auth;


class ChatController extends Controller
{
    //


    public function rooms(Request $request){
        return chat_room::all();
    }


    public function messages(Request $request, $roomid){

        chart_message::where('chat_room_id',$roomid)
        ->with('user')
        ->orderBy('created_at','DESC')
        ->get();

    }

    public function newMessage(Request $request, $roomid){
     $newMessage =   new ChatMessage();

     $newMessage->user_id = Auth::id();
     $newMessage->chat_room_id = $roomid;
     $newMessage->message=$request->message;

     return $newMessage;

    }
}

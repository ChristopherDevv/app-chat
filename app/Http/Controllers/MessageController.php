<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Chat $chat)
{
    // Crear un nuevo mensaje
    $message = new Message();
    $message->user_id = auth()->user()->id;
    $message->chat_id = $chat->id;
    $message->message = $request->message;
    $message->save();

    // Redirigir al usuario a la vista del chat
    return back()->with('message', 'message sended with success!!');
}
}

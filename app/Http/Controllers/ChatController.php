<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index', [
            'users' => User::latest()->get()
        ]);
    }

    public function create(User $user)
    {
        // Buscar un chat existente entre los dos usuarios
        $chat = Chat::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereHas('users', function ($query) {
            $query->where('users.id', auth()->user()->id);
        })->first();

        // Si no existe un chat, crear uno
        if (!$chat) {
            $chat = Chat::create();
            $chat->users()->attach(auth()->user());
            $chat->users()->attach($user);
        }
        $messages = $chat->messages()->with('user')->get();

        return view('chat.create', [
            'user' => $user,
            'chat' => $chat,
            'messages' => $messages
        ]);
    }

}

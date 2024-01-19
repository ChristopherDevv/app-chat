<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:30'
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember) ){
            return back()->with('messageInvalided', 'Invalided credentials, try again!!');
        }

        return to_route('chat.index')->with('message', 'Welcome to CHAT!!');
    }
}

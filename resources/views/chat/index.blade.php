@extends('layouts.app')

@section('title') chat @endsection
{{-- hello --}}
@section('content')
    <h5 class="w-full py-2 text-white text-center font-bold bg-gradient-to-r from-blue-700 to-cyan-400">Chat in live with friends!!</h5>
    @if (session('message'))
        <h4 class="w-full py-2 text-white text-center font-bold bg-gradient-to-r from-green-700 to-green-400">{{session('message')}}</h4>
    @endif
    <section class="w-full max-w-6xl mx-auto py-10 flex items-start justify-between gap-20">
        <div class="w-1/3 px-5 py-8 border bg-white shadow-lg rounded-xl">
            <div class="flex items-center justify-between gap-5">
                <h3 class="font-bold opacity-75 text-lg">{{auth()->user()->name}}</h3>
                <form action="{{route('logout.store')}}" method="POST">
                    @csrf
                    <button onclick="return confirm('Are you sure to logout?')" type="submit" class="text-red-500 transition-all duration-300 hover:bg-opacity-30 shadow-md rounded-md bg-red-400 bg-opacity-20 text-center py-1 px-4 font-bold text-xs">Logout</button>
                </form>
            </div>
            <p class="my-2 text-xs font-semibold opacity-50">Member from {{auth()->user()->created_at->diffForHumans() }}</p>
            <div class="bg-profile mx-auto">
                 <img class="max-w-full w-full h-auto" src="https://ii.ct-stc.com/2/logos/candidates/2023/11/25/220208233492thumbnail.jpeg" alt="">
            </div>
        </div>
        <div class="w-2/3 h-auto shadow-lg rounded-2xl overflow-hidden bg-white">
            <div class="bg-cyan-100 text-cyan-500 pt-2 pb-5 font-bold text-sm w-full text-center">
                Chat with friends
            </div>
            <div class="bg-white w-full h-auto py-10 px-5 rounded-2xl -mt-3 flex flex-col gap-5">
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                    <div class="border-2 border-gray-300 p-3 rounded-lg border-dashed flex items-center justify-center gap-5">
                        <div>
                            <p class="font-bold">{{$user->name}}</p>
                            <p class="text-xs font-semibold opacity-50 mt-1">{{$user->created_at->diffForHumans()}}</p>
                        </div>
                        <a href="{{route('chat.create', $user)}}" class="bg-cyan-100 text-cyan-500 text-center text-xs font-bold rounded-full py-1 px-5 shadow-md">Chat now</a>
                    </div>
                        
                    @endforeach
                @else 
                    <p class="text-center font-bold opacity-50 text-2xl">Not users yet</p>
                @endif
            </div>
        </div>
    </section>
@endsection

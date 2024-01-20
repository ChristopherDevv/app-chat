@extends('layouts.app')

@section('title') chat @endsection

@section('content')
    <h5 class="w-full py-2 text-white text-center font-bold bg-gradient-to-r from-blue-700 to-cyan-400">Chat in live with</h5>
    <section class="w-full max-w-6xl mx-auto py-10 flex items-start justify-between gap-20">
        <div class="w-1/3">
            <div class="w-full px-5 py-8 border bg-white shadow-lg rounded-xl">
                <div class="flex items-center justify-between gap-5">
                    <div>
                        <h3 class="font-bold opacity-75 text-lg">{{auth()->user()->name}}</h3>
                        <p class="mt-2 text-xs font-semibold opacity-50">Member from {{auth()->user()->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="bg-profile mx-auto">
                        <img class="max-w-full w-full h-auto" src="https://ii.ct-stc.com/2/logos/candidates/2023/11/25/220208233492thumbnail.jpeg" alt="">
                   </div>
                </div>
            </div>
            <div class="w-full mt-7 px-5 py-8 border bg-white shadow-lg rounded-xl">
                <div class="flex items-center justify-between gap-5">
                    <div>
                        <h3 class="font-bold opacity-75 text-lg">{{$user->name}}</h3>
                        <p class="mt-2 text-xs font-semibold opacity-50">Member from {{$user->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="bg-profile mx-auto">
                        <div class="w-full h-full bg-gradient-to-tr from-blue-700 to-cyan-400"></div>
                   </div>
                </div>
            </div>
        </div>
        <div class="w-2/3 h-auto shadow-lg rounded-2xl overflow-hidden bg-white">
            <div class="bg-cyan-100 text-cyan-500 pt-2 pb-5 font-bold text-sm w-full text-center">
                Chat with friends
            </div>
            <div class="bg-white w-full py-10 px-5 rounded-2xl -mt-3 flex flex-col gap-2">
                @if (session('message'))
                    <div class="bg-gradient-to-tr from-green-500 to-green-400 text-center text-xs font-bold text-white p-2">
                        {{session('message')}}
                    </div>
                @endif
                <div class="w-full h-36 overflow-y-auto rounded-lg bg-blue-50">
                    @foreach ($messages as $message)
                        <p><strong>{{ $message->user->name }}:</strong> {{ $message->message }}</p>
                    @endforeach
                </div>
                @error('message')
                    <div class="bg-gradient-to-tr from-red-500 to-red-400 text-center text-xs font-bold text-white p-2">
                        {{$message}}
                    </div>
                    
                @enderror
                <form action="{{route('message.store', $chat)}}" method="POST">
                    @csrf
                    <textarea name="message" placeholder="Enter a message" class="w-full h-20 resize-none border-2 border-gray-300 p-2 rounded-md focus:outline-none focus:ring-0"></textarea>
                    <div class="flex items-center justify-end mt-2 mr-2">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto fill-current text-blue-500" viewBox="0 0 24 24"><path d="m21.426 11.095-17-8A1 1 0 0 0 3.03 4.242l1.212 4.849L12 12l-7.758 2.909-1.212 4.849a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81z"></path></svg>
                        </button>
                    </div>
                   
                </form>
            </div>
        </div>
    </section>
@endsection

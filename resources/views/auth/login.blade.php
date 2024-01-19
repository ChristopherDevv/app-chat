@extends('layouts.app')

@section('title') login @endsection

@section('content')
    <div class="box-home flex items-center justify-center">
        <div class="max-w-4xl w-full h-auto text-gray-200 mx-auto flex items-start justify-center gap-20">
            <div class="flex flex-col items-center justify-center">
                <h2 class="font-bold text-2xl">Log in</h2>
                <img class="mt-5 w-40 h-auto" src="https://cp.ct-stc.com/web/20231120.01/c/img/encontrar_empleo.webp" alt="login image">    
            </div>
            <div class="max-w-xs w-full">
                @if (session('messageInvalided'))
                    <p class="text-center mt-2 p-2 mb-3 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{session('messageInvalided')}}</p>
                @endif
                <form action="{{route('login.store')}}" method="POST">
                    @csrf

                    <label for="email" class="font-bold text-sm">E-mail</label>
                    <input id="email" type="email" value="{{old('email')}}" name="email" placeholder="E-mail" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
                    @error('email')
                        <p class="text-center mt-2 p-1 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{$errors->first('email')}}</p>
                    @enderror
                    <label for="password" class="font-bold text-sm mt-3 block">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
                    @error('password')
                        <p class="text-center mt-2 p-1 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{$errors->first('password')}}</p>
                    @enderror
                    <div class="mt-3 flex items-center gap-1">
                        <div class="border-2 border-blue-300 rounded-md w-5 h-5 flex items-center justify-center">
                            <input id="remember" name="remember" type="checkbox" class="border-none m-0 p-0 w-4 h-4">
                        </div>
                        <label for="remember" class="text-xs font-bold">Remember</label>
                    </div>
                    <button type="submit" class="p-2 active:opacity-60 text-center rounded-full bg-gradient-to-r from-blue-700 to-cyan-400 font-bold text-xs uppercase text-white w-full mt-5">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title') register @endsection

@section('content')
    <div class="box-home flex items-center justify-center">
        <div class="max-w-4xl w-full h-auto text-gray-200 mx-auto flex items-start justify-center gap-20">
            <div class="flex flex-col items-center justify-center">
                <h2 class="font-bold text-2xl">Register</h2>
                <img class="mt-5 w-40 h-auto" src="https://cp.ct-stc.com/web/20231120.01/c/img/encontrar_empleo.webp" alt="login image">    
            </div>
            <div class="max-w-xs w-full">
                <form action="{{route('register.store')}}" method="POST">
                    @csrf
                    <label for="name" class="font-bold text-sm">Name</label>
                    <input id="name" value="{{old('name')}}" type="text" name="name" placeholder="E-mail" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
                    @error('name')
                        <p class="text-center mt-2 p-1 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{$errors->first('name')}}</p>
                    @enderror
                    <label for="email" class="font-bold text-sm">E-mail</label>
                    <input id="email" value="{{old('email')}}" type="email" name="email" placeholder="E-mail" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
                    @error('email')
                        <p class="text-center mt-2 p-1 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{$errors->first('email')}}</p>
                    @enderror
                    <label for="password" class="font-bold text-sm mt-3 block">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
                    @error('password')
                        <p class="text-center mt-2 p-1 text-xs rounded-lg text-red-500 bg-red-500 bg-opacity-20 font-semibold">{{$errors->first('password')}}</p>
                    @enderror
                    <label for="password_confirmation" class="font-bold text-sm mt-3 block">Password confirmation</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" class="text-gray-500 mt-1 py-1 px-2 border-[3px] border-blue-200 w-full focus:outline-none focus:right-0 rounded-lg">
            
                    <button type="submit" class="p-2 active:opacity-60 text-center rounded-full bg-gradient-to-r from-blue-700 to-cyan-400 font-bold text-xs uppercase text-white w-full mt-5">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection

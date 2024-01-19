<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - @yield('title')</title>
    @stack('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-blue-50 text-gray-600">
    <main class="overflow-hidden">@yield('content')</main>
</body>
</html>

<style>
    .box-home{
    background: linear-gradient(90deg,rgb(8,41,91) 0%,rgb(13,56,120) 40%,rgb(20, 70, 145) 100%);
    border-radius: 0 0 50% 50%/0 0 30% 30%;
    width: 110%;
    height: 500px;
    overflow: hidden; 
    margin: 0 -5%;
    }
    .bg-profile{
        width: 70px;
        height: 70px;
        overflow: hidden;
        position: relative;
        border-radius: 100px 55px 55px 90px/80px 82px 75px 79px;
        cursor: pointer;
    }
</style>
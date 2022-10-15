<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="">
    <nav class="fixed top-0 shadow bg-white w-full h-12 flex justify-end items-center px-6">
        @if ($active == 'index')
            <a href="{{ route('check') }}" class="px-4 py-2 rounded-lg bg-emerald-500 text-white font-medium text-sm hover:bg-emerald-600 duration-150">Cek Undian</a>
        @else
            <a href="{{ route('index') }}" class="px-4 py-2 rounded-lg bg-emerald-500 text-white font-medium text-sm hover:bg-emerald-600 duration-150">Ambil Undian</a>
        @endif
    </nav>
    @yield('body')
</body>
</html>
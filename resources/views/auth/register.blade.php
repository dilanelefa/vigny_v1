@php
    $theme = \Illuminate\Support\Facades\Cookie::get('theme')
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $theme }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-indigo-100 dark:bg-slate-600 text-dark dark:text-white h-[100vh] flex items-center justify-center">
<div class="w-[25rem] bg-white/30 dark:bg-white/20 backdrop-blur-2xl shadow-2xl p-3 flex flex-col gap-4 rounded-xl">
    <a href="/" class="flex justify-center items-center font-bold text-5xl"><i class="bi bi-vimeo text-orange-500"></i></a>
    <div class="text-center space-y-3">
        <h1 class="text-3xl font-semibold capitalize">Create<br>your account</h1>
        <div>Already have account?<a href="{{ route('login') }}" class="text-orange-500"> Sign in</a></div>
    </div>

    <form action="{{ route('register') }}" method="post" class="px-3 space-y-3 my-1">
        @csrf

        <div class="relative group">
            <label for="name" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-person"></i></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-[100%] bg-white border-2 border-transparent focus:border-orange-500 dark:bg-dark ps-10 pe-2 py-2 rounded-md outline-none" placeholder="User Name">
        </div>
        @error('name')
        <span class="font-bold text-sm mt-1">{{ $message }}</span>
        @enderror

        <div class="relative group">
            <label for="email" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-envelope"></i></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-[100%] bg-white border-2 border-transparent focus:border-orange-500 dark:bg-dark ps-10 pe-2 py-2 rounded-md outline-none" placeholder="Adresse Email">
        </div>
        @error('email')
        <span class="font-bold text-sm mt-1">{{ $message }}</span>
        @enderror

        <div class="relative group">
            <label for="password" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-lock-fill"></i></label>
            <input type="password" id="password" name="password" class="w-[100%] bg-white border-2 border-transparent focus:border-orange-500 dark:bg-dark ps-10 pe-2 py-2 rounded-md outline-none" placeholder="password">
        </div>
        @error('password')
        <span class="font-bold text-sm mt-1">{{ $message }}</span>
        @enderror

        <div class="relative group">
            <label for="password-confirm" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-check-circle"></i></label>
            <input type="password" id="password-confirm" name="password_confirmation" class="w-[100%] bg-white border-2 border-transparent focus:border-orange-500 dark:bg-dark ps-10 pe-2 py-2 rounded-md outline-none" placeholder="password confirm">
        </div>
        @error('password-confirm')
        <span class="font-bold text-sm mt-1">{{ $message }}</span>
        @enderror

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
        </div>
    </form>
</div>
</body>

</html>

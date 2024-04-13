@php
$theme = \Illuminate\Support\Facades\Cookie::get('theme');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$theme}}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'LARAVEL') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" overflow-x-hidden relative">
    <button class="dark-toggle fixed z-20 right-3 bottom-3 md:right-10 md:bottom-10 text-lg font-bold cursor-pointer bg-slate-700/10 dark:bg-white/30 backdrop-blur-xl p-2 md:p-3 rounded-lg text-dark dark:text-white"><i class="bi bi-{{ $theme == "dark"?'sun':'moon' }}"></i></button>
    <header class="bg-white border-b relative border-gray-400 dark:border-slate-400  dark:bg-dark text-dark dark:text-white px-[8%] py-4 flex items-center">
        <nav class="flex justify-between w-full items-center">
            <a href="{{ route("home") }}" class="flex items-center font-bold text-2xl"><i class="bi bi-vimeo text-orange-500"></i><span class="font-pacifico">igny</span></a>

            <div class="nav-links hidden md:block absolute md:relative bg-dark/10 backdrop-blur-lg dark:bg-white/20 md:dark:bg-transparent md:bg-transparent left-0 top-[100%] w-full md:w-auto px-3 py-4 md:p-0 z-10 md:z-0">
                <ul class="flex flex-col md:flex-row gap-8 md:gap-10 text-md font-medium">
                    <li class="{{ !Route::currentRouteNamed('home')?:'active' }}"><a href="{{ route("home") }}">Acceuil</a></li>
                    <li class="{{ !Route::currentRouteNamed('courses.*')?:'active' }}"><a href="#">Courses</a></li>
                    <li class="{{ !Route::currentRouteNamed('blog.*')?:'active' }}"><a href="{{ route('blog.index') }}">Blog</a></li>
                    @auth
                    <li><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    @endauth
                </ul>
            </div>

            @auth
            <div class="flex items-center gap-3">
                <img src="/images/user.png" class="size-10 rounded-full object-cover cursor-pointer shadow-lg" alt="usr">
                <form class="text-lg font-bold cursor-pointer" action="{{ route('logout') }}" method="post">
                    <button><i class="bi bi-box-arrow-right"></i></button>
                    @csrf
                </form>
                <button type="button" class="cursor-pointer w-full flex justify-end me-4 md:hidden toggle-nav"><i class="bi bi-list text-xl"></i></button>
            </div>

            @endauth

            @guest
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="">Login</a>
                <a href="{{ route('register') }}" class="">Register</a>
                <button type="button" class="cursor-pointer w-full flex justify-end me-4 md:hidden toggle-nav"><i class="bi bi-list text-xl"></i></button>
            </div>
            @endguest
        </nav>
    </header>

    <main class="bg-slate-100 dark:bg-gray-800 px-[10%] py-10 text-dark dark:text-white min-h-[100vh]">
        @yield('content')
    </main>
    @yield('scripts')
</body>

</html>
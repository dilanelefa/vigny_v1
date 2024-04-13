@php
    $theme = \Illuminate\Support\Facades\Cookie::get('theme')
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $theme }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title{{ env('APP_NAME') }} | Dashboard </title>
    @vite(['resources/css/dashboard.css', 'resources/js/app.js'])
</head>

<body>
<div class="w-[100vw] h-[100vh] bg-gray-200 dark:bg-gray-800 overflow-hidden flex">
    <aside class="w-[10%] md:w-[20%] h-full bg-white dark:bg-dark text-dark dark:text-white shadow-md">
        <div class="py-3 flex flex-col gap-10">
            <a href="/" class="flex items-center font-bold text-2xl md:ms-7 ms-2"><i class="bi bi-vimeo text-orange-500"></i><span class="font-pacifico hidden md:block">igny</span></a>
            <div class="">
                <ul class="flex flex-col gap-4 md:ms-1 *:font-medium *:ps-2 *:md:ps-4 ">
                    <li class="{{ !Route::currentRouteNamed('dashboard.home')?:'active' }}"><a href="{{ route('dashboard.home') }}" class="space-x-3"><i class="bi bi-house-fill"></i><span class="md:inline-block hidden">Home</span></a></li>
                    <li class="{{ !Route::currentRouteNamed('dashboard.posts.*')?:'active' }}"><a href="{{ route('dashboard.posts.index') }}" class="space-x-3"><i class="bi bi-pencil-square"></i><span class="md:inline-block hidden">Posts</span></a></li>
                    <li class="{{ !Route::currentRouteNamed('dashboard.course.*')?:'active'}}"><a href="#" class="space-x-3"><i class="bi bi-book-fill"></i><span class="md:inline-block hidden">Courses</span></a></li>
                </ul>
            </div>
        </div>
    </aside>

    <main class="h-full w-[95%] md:w-[80%] px-8 pb-10 mt-3 overflow-y-scroll text-dark dark:text-white">
        <div class="flex items-center">
            <div class="relative group">
                <button class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-search"></i></button>
                <input type="search" id="search" class="w-[100%] bg-white dark:bg-dark ps-10 pe-2 py-2 rounded-md outline-none" placeholder="search post...">
            </div>
            <div class="w-full flex justify-end gap-3 items-center">
                <button class="dark-toggle"><i class="bi bi-moon"></i></button>
                <form class="text-lg font-bold cursor-pointer" action="{{ route('logout') }}" method="post">
                    <button><i class="bi bi-box-arrow-right"></i></button>
                    @csrf
                </form>
                <img src="/images/user.png" class="size-7 rounded-full object-cover cursor-pointer shadow-lg">
            </div>
        </div>
        <div class="mt-5">
            @yield('content')
        </div>
    </main>
</div>

@yield('script')
</body>

</html>

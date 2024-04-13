@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center gap-6 mb-4">
        <h1 class=" text-5xl text-orange-500 font-bold">Bienvenue</h1>
        <p class=" italic capitalize font-light">Le blog des developeurs en informatique</p>
        <div class="flex gap-4 w-[100vw] px-[20%]">
            <form action="" class="w-full">
                <div class="relative w-full group">
                    <button class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3"><i class="bi bi-search"></i></button>
                    <input type="search" id="search" name="q"  class="w-[100%] bg-transparent ps-10 pe-2 py-2 rounded-md outline-none focus:border-orange-500 border-2 border-dark/20 dark:border-gray-500" placeholder="search post...">
                </div>
            </form>
            <button><i class="bi bi-filter text-2xl text-yellow-100"></i></button>
        </div>
    </div>

    <div class="mt-20 flex flex-col gap-y-10">

        @foreach ($posts as $post)

            <div class="flex flex-col md:flex-row space-y-3 space-x-10  md:items-center h-full bg-white dark:bg-dark/75 shadow-md rounded-xl  hover:shadow-2xl md:ps-3 pb-3 md:pb-0 transition">
                <img src="{{ asset($post->cover) }}" alt="" class="rounded-lg md:w-[35%] h-[200px] object-cover">
                <div class="md:w-[50%] flex flex-col justify-between  gap-3 md:py-3">
                    <h1 class="text-2xl font-bold"><a href="{{ route('blog.show', ['post' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h1>
                    <div class="flex gap-4 items-center">
                        <img src="/images/user.png" alt="" class="size-8 rounded-full object-cover">
                        <span class=" text-gray-700 dark:text-slate-400">{{ $post->user->name }}</span>
                    </div>
                    <p class="text-md text-gray-700 dark:text-slate-300">{{ strlen($post->description) < 250 ? $post->description : substr($post->description, 0, 250).'...' }}</p>
                    <div class="flex gap-4 mt-2 *:text-sm">
                        <span class="bg-orange-500 text-yellow-100 px-3 py-2 rounded-xl">{{ $post->created_at }}</span>
                    </div>
                </div>
            </div>

        @endforeach

        {{ $posts->links() }}
    </div>
@endsection

@extends('layouts.dashboard')

@section('content')
    <div class="flex font-medium space-x-2 text-lg">
        <a href="" class="text-orange-500">Articles</a>
        <span>\</span>
        <a href="">Liste</a>
    </div>

    <div class="mt-5 flex">
        <div class="w-[80%]">
            <div class="flex justify-between w-full items-center">
                <div class="rounded-lg p-3 w-[15rem] bg-slate-400 flex flex-col justify-center items-center text-white dark:text-dark">
                    <span class="text-lg font-bold ">Total Articles</span>
                    <span class="text-xl font-bold">0</span>
                </div>
                <div class="rounded-lg p-3  w-[15rem] bg-slate-400 flex flex-col justify-center items-center text-white dark:text-dark">
                    <span class="text-lg font-bold ">Total Vues</span>
                    <span class="text-xl font-bold">0</span>
                </div>
                <div class="rounded-lg p-3  w-[15rem] bg-slate-400 flex flex-col justify-center items-center text-white dark:text-dark">
                    <span class="text-lg font-bold ">Total Commentaires</span>
                    <span class="text-xl font-bold">0</span>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Mes articles</h1>
                    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-orange-500">Nouveau article</a>
                </div>
                <div class="space-y-5 mt-4">
                    @foreach ($posts as $post)
                        <div class="flex flex-col md:flex-row space-y-3 space-x-10  md:items-center h-full bg-white dark:bg-dark/75 shadow-md rounded-xl hover:shadow-2xl md:ps-3 pb-3 md:pb-0 transition">
                            <img src="{{ asset($post->cover) }}" alt="" class="rounded-lg md:w-[35%] h-[200px] object-cover">
                            <div class="md:w-[65%] flex flex-col justify-between  gap-3 md:py-3">
                                <h1 class="text-2xl font-bold"><a href="{{ route('blog.show', ['post' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h1>
                                <div class="flex gap-4 items-center">
                                    <img src="/images/user.png" alt="" class="size-8 rounded-full object-cover">
                                    <span class=" text-gray-700 dark:text-slate-400">{{ $post->user->name }}</span>
                                </div>
                                <p class="text-md text-gray-700 dark:text-slate-300">{{ strlen($post->description) < 100 ? $post->description : substr($post->description, 0, 100).'...' }}</p>
                                <div class="flex gap-4 mt-2 *:text-sm">
                                    <span class="bg-orange-500 text-yellow-100 px-3 py-2 rounded-xl">{{ $post->created_at }}</span>
                                    <a href="{{ route('dashboard.posts.edit', $post->id) }}" class=" bg-yellow-100 text-orange-500 px-3 py-2 rounded-xl">Editer</a>
                                    <form action="{{ route('dashboard.posts.destroy', [$post]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class=" bg-red-500 text-white px-3 py-2 rounded-xl">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-[20%] ml-4">

        </div>
    </div>

@endsection

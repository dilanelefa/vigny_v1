@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4">
        <span class="text-slate-400">{{ $post->created_at }}</span>
        <h1 class="text-5xl font-bold block">{{ $post->title }}</h1>
        <div class="flex gap-4 items-center">
            <img src="/images/user.png" alt="" class="size-10 rounded-full object-cover">
            <span class=" text-gray-800 dark:text-slate-400">{{ $post->user->name }}</span>
        </div>
    </div>

    <div class="mt-5">
        <span class="text-md font-medium">{{ $post->description }}</span>
    </div>

    @if($post->cover)
        <img src="{{ asset($post->cover) }}" class="rounded-xl mt-10 w-full object-cover" alt="thumbnail">
    @endif

    <div class="content font-poppins mt-10">
        @markdown($post->content)
    </div>
@endsection

@section('scripts')
    @vite('resources/js/highlight.js')
@endsection

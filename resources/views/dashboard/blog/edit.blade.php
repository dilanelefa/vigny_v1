@extends('layouts.dashboard')

@section('content')
    <div class="flex font-medium space-x-2 text-lg">
        <a href="{{ route('dashboard.posts.index') }}" class="text-orange-500">Articles</a>
        <span>\</span>
        <a href="">Modifier</a>
    </div>

    <div class="mt-5">
        <form action="{{  route('dashboard.posts.update', $post->id) }}" method="post" class="space-y-4 flex flex-col" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <button type="submit" class="btn btn-orange-500 w-fit self-end">Modifier</button>
            <div class="relative group">
                <label for="title" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3">Titre</label>
                <input type="text" value="{{ old('title', $post->title) }}" id="title" name="title" class="w-[100%] @error('title') 'border border-red-500 text-red-500' @enderror bg-white dark:bg-dark ps-20 pe-2 py-2 rounded-md outline-none">
                @error('title')
                <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative group">
                <label for="description" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3">Description</label>
                <textarea id="description" name="description" rows=3 class="w-[100%] bg-white dark:bg-dark ps-32 pe-2 py-2 rounded-md outline-none @error('cover') 'border border-red-500 text-red-500' @enderror">{{ old('description', $post->description) }}</textarea>
                @error('description')
                <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative group">
                <button class="px-4 py-2 bg-orange-500 font-semibold text-white rounded-3 relative rounded-lg overflow-hidden">
                    <i class="bi bi-upload me-2"></i><span>Change cover</span>
                    <input type="file" name="cover" id="cover" class="absolute top-0 left-30 scale-[2] opacity-0">
                </button>
                @error('cover')
                <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <textarea name="content" id="editor" rows="10" class="w-[100%] bg-white dark:bg-dark px-2 py-2 rounded-md outline-none">{{ old('content', $post->content) }}</textarea>

        </form>
    </div>
@endsection

@section('script')
    @vite('resources/js/editor.js')
@endsection

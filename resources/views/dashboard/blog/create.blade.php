@extends('layouts.dashboard')

@section('content')
    <div class="flex font-medium space-x-2 text-lg">
        <a href="{{ route('dashboard.posts.index') }}" class="text-orange-500">Articles</a>
        <span>\</span>
        <a href="">Nouveau</a>
    </div>

    <div class="mt-5">
        <form action="{{ route('dashboard.posts.store') }}" method="post" enctype="multipart/form-data" class="space-y-4 flex flex-col">
            @csrf
            <button type="submit" class="btn btn-orange-500 w-fit self-end">Creer</button>
            <div class="relative group">
                <label for="title" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3">Titre</label>
                <input type="text" value="{{ old('title') }}" id="title" name="title" class="w-[100%] @error('title') 'border border-red-500 text-red-500' @enderror bg-white dark:bg-dark ps-20 pe-2 py-2 rounded-md outline-none">
                @error('title')
                <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                @enderror
            </div>

                <div class="col-span-full">
                    <label for="cover" class="block  text-sm font-medium leading-6">Cover photo</label>
                    <div class="mt-2 flex bg-white dark:bg-dark justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center ">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold text-orange-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-orange-600 focus-within:ring-offset-2 hover:text-orange-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="cover" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 4MB</p>
                        </div>
                    </div>
                    @error('cover')
                    <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                    @enderror
                </div>

            <div class="relative group">
                <label for="description" class="absolute top-[50%] group-has-[:focus]:text-orange-500 -translate-y-[50%] left-3">Description</label>
                <textarea id="description" name="description" rows=3 class="w-[100%] bg-white dark:bg-dark ps-32 pe-2 py-2 rounded-md outline-none @error('cover') 'border border-red-500 text-red-500' @enderror">{{ old('description') }}</textarea>
                @error('description')
                <span class="mt-1 text-red-500 ms-4 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <textarea name="content" id="editor" rows="10" class="w-[100%] bg-white dark:bg-dark px-2 py-2 rounded-md outline-none">{{ old('content') }}</textarea>

        </form>
    </div>
@endsection

@section('script')
    @vite('resources/js/editor.js')
@endsection

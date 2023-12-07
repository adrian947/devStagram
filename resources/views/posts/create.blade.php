@extends('layouts.app')

@section('title')
    Create new post
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            <form action="{{ route('image.create') }}" method="POST" enctype="multipart/form-data" id=dropzone
                class="dropzone flex h-96 w-full flex-col items-center justify-center border-2 border-dashed">
                @csrf
            </form>
        </div>
        <div class="rounded-lg bg-white p-4 px-10 shadow md:w-1/2">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <div>
                        <label for="title" class="mb-2 block font-bold uppercase text-gray-500">Title</label>
                    </div>
                    <input id="title" name="title" type="text" placeholder="Enter title post"
                        class="@error('title') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                        value="{{ old('title') }}" />
                    @error('title')
                        <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <div>
                        <label for="description" class="mb-2 block font-bold uppercase text-gray-500">Description</label>
                    </div>
                    <textarea id="description" name="description" type="text" placeholder="Enter description post"
                        class="@error('description') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" id="image" name="image" value="{{ old('image') }}"/>
                    @error('image')
                        <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Create post"
                    class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700" />
            </form>
        </div>

    </div>
@endsection

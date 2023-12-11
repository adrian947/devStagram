@extends('layouts.app')

@section('title')
    Profile: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="bg-white p-4 shadow md:w-1/2">
            <form class="mt-10 md:mt-0" method="POST" action="{{route('profile.store', auth()->user()->username)}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <div>
                        <label for="username" class="mb-2 block font-bold uppercase text-gray-500">Username</label>
                    </div>
                    <input id="username" name="username" type="text" placeholder="Enter your username"
                        class="@error('username') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                        value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <div>
                        <label for="image" class="mb-2 block font-bold uppercase text-gray-500">Image</label>
                    </div>
                    <input id="image" name="image" type="file" placeholder="Enter your image"
                        class="@error('image') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                        accept=".jpg, .jpeg, .png" />
                    @error('image')
                        <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Update profile"
                class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700" />

            </form>

        </div>

    </div>
@endsection

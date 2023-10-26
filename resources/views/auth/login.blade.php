@extends('layouts.app')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="justify-center md:flex md:gap-4">
        <div class="md:w-4/12">
            <img src="{{ asset('img/login.jpg') }}" alt="image register" class="rounded-lg">
        </div>
        <div class="rounded-lg bg-white p-4 shadow md:w-4/12">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (session('message'))
                    <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                        {{ session('message') }}
                    </p>
                @endif
                <div class="mb-5">

                    <div class="mb-5">
                        <div>
                            <label for="email" class="mb-2 block font-bold uppercase text-gray-500">Email</label>
                        </div>
                        <input id="email" name="email" type="email" placeholder="Enter your email"
                            class="@error('email') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                            value="{{ old('email') }}" />
                        @error('email')
                            <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <div>
                            <label for="password" class="mb-2 block font-bold uppercase text-gray-500">Password</label>
                        </div>
                        <input id="password" name="password" type="password" placeholder="Enter your password"
                            class="@error('password') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3" />
                        @error('password')
                            <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input type="checkbox" id="remember" />
                        <label for="remember" class="mb-2 font-bold uppercase text-gray-500">Keep session open</label>
                    </div>
                    <input type="submit" value="Login"
                        class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700" />
            </form>
        </div>
    </div>
@endsection

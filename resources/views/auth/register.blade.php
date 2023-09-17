@extends('layouts.app')

@section('title')
  Sign up
@endsection

@section('content')
  <div
       class="justify-center md:flex md:gap-4">
    <div
         class="md:w-4/12">
      <img src="{{ asset('img/registrar.jpg') }}"
           alt="image register"
           class="rounded-lg">
    </div>
    <div
         class="rounded-lg bg-white p-4 shadow md:w-4/12">
      <form action="{{ route('register') }}"
            method="POST">
        @csrf
        <div
             class="mb-5">
          <div>
            <label for="name"
                   class="mb-2 block font-bold uppercase text-gray-500">Name</label>
          </div>
          <input id="name"
                 name="name"
                 type="text"
                 placeholder="Enter your name"
                 class="@error('name') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                 value="{{ old('name') }}" />
          @error('name')
            <p
               class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div
             class="mb-5">
          <div>
            <label for="username"
                   class="mb-2 block font-bold uppercase text-gray-500">UserName</label>
          </div>
          <input id="username"
                 name="username"
                 type="text"
                 placeholder="Enter your username"
                 class="@error('username') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                 value="{{ old('username') }}" />
          @error('username')
            <p
               class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div
             class="mb-5">
          <div>
            <label for="email"
                   class="mb-2 block font-bold uppercase text-gray-500">Email</label>
          </div>
          <input id="email"
                 name="email"
                 type="email"
                 placeholder="Enter your email"
                 class="@error('email') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3"
                 value="{{ old('email') }}" />
          @error('email')
            <p
               class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div
             class="mb-5">
          <div>
            <label for="password"
                   class="mb-2 block font-bold uppercase text-gray-500">Password</label>
          </div>
          <input id="password"
                 name="password"
                 type="password"
                 placeholder="Enter your password"
                 class="@error('password') 
                            border-red-600 
                        @enderror w-full rounded-lg border p-3" />
          @error('password')
            <p
               class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div
             class="mb-5">
          <div>
            <label for="password_confirmation"
                   class="mb-2 block font-bold uppercase text-gray-500">Repeat
              Password</label>
          </div>
          <input id="password_confirmation"
                 name="password_confirmation"
                 type="password"
                 placeholder="Enter your password again"
                 class="w-full rounded-lg border p-3" />
        </div>
        <input type="submit"
               value="Sign Up!"
               class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700" />
      </form>
    </div>
  </div>
@endsection

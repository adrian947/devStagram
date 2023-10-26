@extends('layouts.app')

@section('title')
    Profile: {{ $user->username }}
@endsection


@section('content')
    <div class="flex justify-center">
        <div class="w-full flex flex-col md:flex-row md:w-8/12 lg:w-6/12 justify-center items-center">
            <div class="px-5 w-6/12 md:w-8/12 lg:w-6/12">
                <img src="{{ asset('img/usuario.svg') }}" alt="image user" />
            </div>
            <div class="px-5 md:w-8/12 lg:w-6/12 flex flex-col md:justify-center items-center md:items-start ">
                <p class="text-2xl text-gray-700 mb-5 mt-5 md:mt-0">
                    {{ $user->username }}
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Followers</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Following</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection

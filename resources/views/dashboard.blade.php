@extends('layouts.app')

@section('title')
    Profile: {{ $user->username }}
@endsection


@section('content')
    <div class="flex justify-center">
        <div class="flex w-full flex-col items-center justify-center md:w-8/12 md:flex-row lg:w-6/12">
            <div class="w-6/12 px-5 md:w-8/12 lg:w-6/12">
                <img src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/usuario.svg') }}"
                    alt="image user" />
            </div>
            <div class="flex flex-col items-center px-5 md:w-8/12 md:items-start md:justify-center lg:w-6/12">
                <div class="flex gap-2">
                    <p class="mb-5 mt-5 text-2xl text-gray-700 md:mt-0">
                        {{ $user->username }}
                    </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a class="cursor-pointer text-gray-500 hover:text-gray-600"
                                href="{{ route('profile.index', $user) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>

                            </a>
                        @endif
                    @endauth
                </div>


                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal"> Followers</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal"> Following</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->posts->count() }}
                    <span class="font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-center text-4xl font-black">
            Post
        </h2>
        @if ($posts->count())
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
                    <div>
                        <a href={{ route('posts.show', ['post' => $post, 'user' => $user]) }}>
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="img post {{ $post->title }}" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-center text-sm font-bold uppercase text-gray-600">there is not posts</p>
        @endif
    </section>
@endsection

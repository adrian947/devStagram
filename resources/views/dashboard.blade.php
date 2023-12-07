@extends('layouts.app')

@section('title')
    Profile: {{ $user->username }}
@endsection


@section('content')
    <div class="flex justify-center">
        <div class="flex w-full flex-col items-center justify-center md:w-8/12 md:flex-row lg:w-6/12">
            <div class="w-6/12 px-5 md:w-8/12 lg:w-6/12">
                <img src="{{ asset('img/usuario.svg') }}" alt="image user" />
            </div>
            <div class="flex flex-col items-center px-5 md:w-8/12 md:items-start md:justify-center lg:w-6/12">
                <p class="mb-5 mt-5 text-2xl text-gray-700 md:mt-0">
                    {{ $user->username }}
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal"> Followers</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    0
                    <span class="font-normal"> Following</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $posts->count() }}
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
                        <a href={{ route('posts.show', ['post'=> $post, 'user'=>$user ])}}>
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="img post {{ $post->title }}" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{$posts->links('pagination::tailwind')}}
            </div>
        @else
            <p class="text-center text-sm font-bold uppercase text-gray-600">there is not posts</p>
        @endif
    </section>
@endsection

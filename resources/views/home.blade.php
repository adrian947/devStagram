@extends('layouts.app')
@section('title')
    HOME
@endsection
@section('content')
    <div class="flex gap-2">
        @forelse ($posts as $post)
            <div class="mb-4 max-w-xs overflow-hidden rounded-lg bg-white shadow-lg">
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user->userName]) }}">
                    <img class="h-48 w-full object-cover" src="{{ asset('uploads') . '/' . $post->image }}"
                        alt="img post {{ $post->title }}">
                </a>
                <div class="p-4">
                    <h3 class="mb-2 text-lg font-semibold">
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user->userName]) }}"
                            class="text-blue-500 hover:underline">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-gray-700">{{ $post->user->name }}</p>
                </div>
            </div>

        @empty
            <p>There aren't post</p>
        @endforelse
    </div>
@endsection

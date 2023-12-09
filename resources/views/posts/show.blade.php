@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection


@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="img post {{ $post->title }}" />
            @auth
                <div class="flex items-center gap-3">
                    @if ($post->checkLikes(auth()->user()))
                        <form method="POST" action="{{ route('posts.likes.destroy', $post) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                <div class="my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('posts.likes.store', $post) }}">
                            @csrf
                            <button type="submit">
                                <div class="my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                    @endif
                        <p class="font-bold">
                            {{$post->likes->count()}} <span class="font-normal">likes</span>
                        </p>
                </div>
            @endauth
            <div>
                <p class="font-bold">{{ $user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
                @auth
                    @if ($post->user_id === auth()->user()->id)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete post"
                                class="w-full cursor-pointer rounded-lg bg-red-600 p-3 font-bold uppercase text-white transition-colors hover:bg-red-700" />
                        </form>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-5 md:w-full">
            <div class="mb-5 bg-white p-5 shadow">
                @auth
                    <p class="mb-7 text-center text-xl font-bold">Add new comment</p>
                    @if (session('message'))
                        <div class="mb-6 rounded-lg bg-green-500 p-2 text-center font-bold uppercase text-white">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <div>
                                <label for="comment" class="mb-2 block font-bold uppercase text-gray-500">Comment</label>
                            </div>
                            <textarea id="comment" name="comment" type="text" placeholder="Enter Comment post"
                                class="@error('comment') 
                            border-red-600 
                            @enderror w-full rounded-lg border p-3">{{ old('comment') }}</textarea>
                            @error('comment')
                                <p class="mt-1 rounded-lg bg-red-600 p-1 text-center text-white">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Create comment"
                            class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700" />
                    @endauth
                    <div class="mb-5 mt-10 max-h-96 overflow-y-scroll bg-white shadow">
                        @if ($post->comments->count())
                            @foreach ($post->comments as $comment)
                                <div class="border-b border-gray-300 p-5">
                                    <a class="font-bold"
                                        href="{{ route('posts', $comment->user) }}">{{ $comment->user->username }}</a>
                                    <p>{{ $comment->comment }}</p>
                                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="p-10 text-center">No comment yet!</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

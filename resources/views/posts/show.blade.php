@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection


@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="img post {{ $post->title }}" />
            <div class="p-3">
                <p>
                    0 likes
                </p>
            </div>
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

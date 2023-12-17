<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">
    <header class="border-b bg-white p-5 shadow">
        <div class="container mx-auto flex items-center justify-between">
            <a href="/home">
                <h1 class="text-3xl font-black">DevStagram</h1>
            </a>
            @auth
                <nav class="flex items-center gap-3">
                    <a href="{{ route('posts.create') }}"
                        class="flex cursor-pointer items-center gap-2 rounded border bg-white p-2 text-sm font-bold uppercase text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>

                        Crear</a>
                    <a class="font-bold text-gray-600" href="{{ route('posts', auth()->user()->username) }}">HI: <span
                            class="font-normal">{{ auth()->user()->username }}</span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600">Logout</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-3">
                    <a class="font-bold uppercase text-gray-600" href="/login">Login</a>
                    <a class="font-bold uppercase text-gray-600" href={{ route('register') }}>SignUp</a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-center text-3xl font-black">
            @yield('title')

        </h2>
        @yield('content')
    </main>
    <footer class="mt-8 bg-gray-200 p-5 text-center uppercase text-gray-600">
        DevStagram - &#174; copyright {{ now()->year }} - Hecho con &#10084; por Adrián Adducchio
    </footer>

</body>

</html>

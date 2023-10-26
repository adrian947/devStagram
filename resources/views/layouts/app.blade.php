<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="border-b bg-white p-5 shadow">
        <div class="container mx-auto flex items-center justify-between">

            <h1 class="text-3xl font-black">DevStagram</h1>


            @auth
                <nav class="flex gap-3">
                    <a class="font-bold text-gray-600" href="#">HOLA: <span
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

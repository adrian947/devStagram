<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">

            <h1 class="text-3xl font-black">DevStagram</h1>
            <nav class=" flex gap-3">
                <a class="font-bold uppercase text-gray-600" href="/login">Login</a>
                <a class="font-bold uppercase text-gray-600" href={{ route('register')}}>SignUp</a>
            </nav>

        </div>
    </header>
    
        <main class=" container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')

            </h2>
            @yield('content')
        </main>
        <footer class="text-center p-5 text-gray-600 uppercase bg-gray-200 mt-8">
            DevStagram - &#174; copyright {{ now()->year }} - Hecho con &#10084; por Adrián Adducchio
        </footer>
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevLab — @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,600;0,9..144,700;1,9..144,600&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#120f0e] text-[#ede6e0] min-h-screen antialiased selection:bg-orange-400 selection:text-[#120f0e]">
    <header class="border-b border-[#2b2320] bg-[#120f0e]/95 backdrop-blur sticky top-0 z-20">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-2xl font-bold tracking-tight text-[#f5efe9] flex items-center">
                <span>Rev</span><span class="italic text-orange-400">Lab</span>
            </a>

            <nav class="flex items-center gap-6 font-mono text-xs uppercase tracking-wider text-[#a89c94]">
                <a href="{{ route('home') }}" class="hover:text-orange-400 transition-colors">Home</a>
                <a href="{{ route('cars.index') }}" class="hover:text-orange-400 transition-colors">Cars</a>
                <a href="{{ route('posts.index') }}" class="hover:text-orange-400 transition-colors">Forum</a>

                @auth
                    <a href="{{ route('profile.edit') }}" class="hover:text-orange-400 transition-colors">Settings</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-purple-300 transition-colors cursor-pointer uppercase">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-orange-400 transition-colors">Log in</a>
                    <a href="{{ route('register') }}"
                       class="px-3.5 py-1.5 border border-purple-300/40 text-purple-200 hover:bg-purple-300 hover:text-[#120f0e] transition-colors">
                        Register
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-10">
        <div class="border-b border-[#2b2320] pb-5 mb-8">
            <h1 class="font-display text-3xl sm:text-5xl font-bold tracking-tight text-[#f5efe9]">@yield('title')</h1>
        </div>

        <div>
            @yield('content')
        </div>
    </main>
</body>
</html>
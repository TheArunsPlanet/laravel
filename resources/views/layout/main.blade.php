<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black text-neutral-200 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="py-4 border-b border-neutral-800">
        <div class="flex items-center justify-between max-w-7xl mx-auto px-4 md:px-0">
            
            <!-- Logo -->
            <a href="{{ route('welcome') }}" 
               class="font-bold text-2xl md:text-3xl tracking-wide text-[#db0042]">
                Harpy
            </a>

            <!-- Menu -->
            <ul class="flex gap-8 items-center text-lg md:text-xl font-medium">
                <li><a href="{{ route('welcome') }}" class="hover:text-white transition-colors">Home</a></li>
                @if(Auth::check())
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-red-400 transition-colors font-medium">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Register</a></li>
                @endif
            </ul>

        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-6 text-neutral-400 text-sm md:text-base">
        <p>© {{ date('Y') }} Harpy</p>
    </footer>

</body>
</html>

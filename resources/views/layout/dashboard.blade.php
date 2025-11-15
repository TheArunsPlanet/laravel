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
    <nav class="py-4">
        <div class="flex items-center justify-between max-w-7xl mx-auto">
            <!-- Logo -->
            <a href="{{ route('welcome') }}" 
               class="font-bold text-xl tracking-wide"
               style="color:#db0042;">
                Harpy
            </a>

            <!-- Menu -->
            <ul class="flex gap-8 mx-auto items-center text-lg font-medium text-neutral-200 ">
                <li class="flex gap-6">
                    <a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Home</a>
                    <a href="{{ route('create') }}" class="hover:text-white transition-colors">Create</a>
                    <a href="{{ route('posts') }}" class="hover:text-white transition-colors">Posts</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-400 transition-colors font-medium">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-6 text-neutral-400">
        <p>© {{ date('Y') }} Harpy</p>
    </footer>

</body>
</html>

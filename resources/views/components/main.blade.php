<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>
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
        {{-- Flash messages --}}
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="rounded-md border border-green-700/40 bg-green-900/20 text-green-300 px-4 py-3">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="rounded-md border border-red-700/40 bg-red-900/20 text-red-300 px-4 py-3">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if (session('status'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="rounded-md border border-green-700/40 bg-green-900/20 text-green-300 px-4 py-3">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="rounded-md border border-red-700/40 bg-red-900/20 text-red-300 px-4 py-3">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="text-center py-6 text-neutral-400 text-sm md:text-base">
        <p>{{ date('Y') }} Harpy</p>
    </footer>

</body>
</html>

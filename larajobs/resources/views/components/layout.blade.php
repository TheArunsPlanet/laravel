<!DOCTYPE html>
<html lang="en" class="h-full bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
<div class="min-h-full">
  <nav class="bg-black/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <!-- logo harpy text -->
            <text class="text-3xl font-bold tracking-tight text-[#db0042]">Harpy</text>
          </div>
          <div class="hidden md:block">
           <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
              <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
          </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            @guest
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()->is('register')">Sign Up</x-nav-link>
            @endguest
            @auth
            <form method="POST" action="/logout">
                @csrf
                <x-nav-button href="/logout">Logout</x-nav-button>
            </form>
            @endauth
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <a href="/" class="{{ request()->is('/') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium text-white">Home</a>
        <a href="/about" class="{{ request()->is('about') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium text-white">About</a>
        <a href="/contact" class="{{ request()->is('contact') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium text-white">Contact</a>
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            @guest
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()->is('register')">Sign Up</x-nav-link>
            @endguest
            @auth
            <form method="POST" action="/logout">
                @csrf
                <x-nav-button href="/logout">Logout</x-nav-button>
            </form>
            @endauth
          </div>
        </div>
      </div>
    </el-disclosure>
  </nav>

    <header class="relative bg-black after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex  sm:justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>

            <x-button href="/jobs/create">Create Job</x-button>
        </div>
    </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

</body>
</html>
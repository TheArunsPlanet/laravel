<x-main title="Register">

<main class="flex-1 flex items-center justify-center min-h-[calc(100vh-4rem)]">
    <div class="w-full max-w-md px-6 py-8 bg-black text-neutral-200 flex flex-col gap-6">
        
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-[#db0042] text-center">
            Register
        </h1>

        <!-- Form -->
        <form method="POST" action="{{ route('register.submit') }}" class="flex flex-col gap-4">
            @csrf

            <input type="text" name="name" placeholder="Name"
                   class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2"
                   style="focus:ring-color: #db0042;"
                   required>

            <input type="email" name="email" placeholder="Email"
                   class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2"
                   style="focus:ring-color: #db0042;"
                   required>

            <input type="password" name="password" placeholder="Password"
                   class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2"
                   style="focus:ring-color: #db0042;"
                   required>

            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                   class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2"
                   style="focus:ring-color: #db0042;"
                   required>

            <button type="submit"
                    class="mt-2 px-4 py-3 text-white font-semibold rounded transition hover:brightness-90"
                    style="background-color: #db0042;">
                Register
            </button>
        </form>

        <!-- Optional: Login link -->
        <p class="text-center text-neutral-500">
            Already have an account? 
            <a href="{{ route('login') }}" class="hover:underline" style="color:#db0042;">Login</a>
        </p>

    </div>
</main>
</x-main>

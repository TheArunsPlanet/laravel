<x-dashboard title="Create Post">
<main class="flex-1 flex items-center justify-center min-h-[calc(100vh-4rem)] bg-black">
    <div class="w-full max-w-lg px-6 py-8 bg-black text-neutral-200 flex flex-col gap-6">
        
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-[#db0042] text-center">
            Create Post
        </h1>

        <!-- Form -->
        <form action="/create" method="POST" class="flex flex-col gap-4">
            @csrf

            <input type="text" name="title" placeholder="Title"
                   class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2 focus:ring-[#db0042]"
                   required>

            <textarea name="content" placeholder="Content" rows="4"
                      class="px-4 py-3 bg-neutral-900 border border-neutral-700 rounded text-white placeholder-neutral-500 focus:outline-none focus:ring-2 focus:ring-[#db0042]"
                      required></textarea>

            <button type="submit"
                    class="mt-2 px-4 py-3 bg-[#db0042] text-white font-semibold rounded transition hover:brightness-90">
                Create Post
            </button>
        </form>
    </div>
</main>
</x-dashboard>

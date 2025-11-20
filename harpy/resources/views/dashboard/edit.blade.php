<x-dashboard title="Edit Post">
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6 text-white">Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-white">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full p-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-[#db0042] focus:border-[#db0042]">
            </div>

            <div>
                <label for="content" class="block text-white">Content</label>
                <textarea name="content" id="content" rows="10" class="w-full p-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-[#db0042] focus:border-[#db0042]">{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="bg-[#db0042] text-white px-4 py-2 rounded-lg hover:bg-[#db0042]/80 transition-colors">Update Post</button>
        </form>
    </div>
</x-dashboard>

@extends('layout.dashboard')

@section('title', 'All Posts')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6 text-white">All Posts</h1>

        @if($posts->isEmpty())
            <p class="text-neutral-400">No posts available.</p>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-gray-900 border border-gray-700 rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300 flex flex-col">
                        <h2 class="text-lg font-semibold mb-1 text-[#db0042]">{{ $post->title }}</h2>
                        <p class="text-neutral-300 mb-2 text-sm">{{ Str::limit($post->content, 100, '...') }}</p>
                        <p class="text-xs text-neutral-500 mb-2">Published: {{ $post->created_at->format('M d, Y') }}</p>
                        <div class="mt-auto flex space-x-2 text-sm">
                            <a href="{{ route('posts.edit', $post) }}" class="text-[#db0042] hover:text-[#db0042] font-medium">Edit</a>
                            <span class="text-neutral-500">|</span>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#db0042] hover:text-[#db0042] font-medium">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

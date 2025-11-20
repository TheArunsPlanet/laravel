<x-dashboard title="Home">

    @php
        $name = auth()->user()->name;
        $first = substr($name, 0, 1);
        $rest = substr($name, 1);
    @endphp

    <div class="flex items-center justify-center min-h-[calc(100vh-4rem)]">
        <h1 class="text-4xl font-bold text-white text-center">
            Welcome to the <span class="text-[#db0042]">Harpy!</span>
            <span>
                <span class="text-[#db0042] underline text-4xl">{{ $first }}</span>{{ $rest }}
            </span>
        </h1>
    </div>
</x-dashboard>

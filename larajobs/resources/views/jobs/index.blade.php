<x-layout>
    <x-slot name="heading">Jobs</x-slot>

    <div class="space-y-4 border-gray-200 rounded-lg">

        @foreach ($jobs as $job)
            <h2 class="text-2xl font-bold tracking-tight text-white">
                Title: {{ $job->title }}
            </h2>

            <p class="text-white">
                This pays {{ $job->salary }} monthly
            </p>

            <a class="text-blue-500 hover:text-blue-600" href="{{ route('jobs.show', $job->id) }}">
                View Job
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>

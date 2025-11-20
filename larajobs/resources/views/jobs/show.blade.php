<x-layout>
    <x-slot name="heading">Job</x-slot>
    <!-- <h1 class="text-3xl font-bold tracking-tight text-white">Job from the Jobs page</h1>   -->

    <h2 class="text-2xl font-bold tracking-tight text-white">Title: {{ $job["title"] }}</h2>
    <p class="text-white">This pays {{ $job["salary"] }}</p>
    <p class="text-white">Employer: {{ $job["employer"]["name"] }}</p>

    <hr class="my-6 border-white">

    <div class="mt-10 flex justify-between">
        @can('edit-job', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        @endcan
        <a class="text-blue-500 hover:text-blue-600" href="/jobs">Back to Jobs</a>
    </div>
</x-layout>
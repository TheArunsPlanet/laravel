<x-layout>
    <x-slot name="heading">Edit Job {{ $job->title }}</x-slot>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                <x-form-label for="title">Title</x-form-label>
                <div class="mt-2">
                    <x-form-input name="title" id="title" placeholder="Brand Developer" value="{{ $job->title }}" />
                    <x-form-error name="title" />
                </div>
                </div>

                <div class="sm:col-span-4">
                <x-form-label for="salary">Salary</x-form-label>
                <div class="mt-2">
                    <x-form-input name="salary" id="salary" placeholder="100000" value="{{ $job->salary }}" />
                    <x-form-error name="salary" />
                </div>
                </div>
                
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div>
                <form action="/jobs/{{ $job->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-form-button type="submit">Delete</x-form-button>
                </form>
            </div>

            <div>
                <a class="text-blue-500 hover:text-blue-600" href="/jobs/{{ $job->id }}">Cancel</a>
                <x-form-button type="submit">Update</x-form-button>
            </div>
        </div>
    </form>

</x-layout>


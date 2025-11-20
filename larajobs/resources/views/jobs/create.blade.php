<x-layout>
    <x-slot name="heading">Create Job</x-slot>

    <form method="POST" action="/jobs">
        @csrf
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Create Job</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We just need a handfull of details from you.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                <x-form-label for="title">Title</x-form-label>
                <div class="mt-2">
                    <x-form-input name="title" id="title" placeholder="Brand Developer" value="{{ old('title') }}" />
                    <x-form-error name="title" />
                </div>
                </div>

                <div class="sm:col-span-4">
                <x-form-label for="salary">Salary</x-form-label>
                <div class="mt-2">
                    <x-form-input name="salary" id="salary" placeholder="100000" value="{{ old('salary') }}" />
                    <x-form-error name="salary" />
                </div>
                </div>
                
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>

</x-layout>


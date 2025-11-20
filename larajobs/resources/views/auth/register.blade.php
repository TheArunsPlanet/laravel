<x-layout>
    <x-slot name="heading">Register</x-slot>

    <form method="POST" action="/register">
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
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                    <x-form-input name="name" id="name" placeholder="Naruto" value="{{ old('name') }}" />
                    <x-form-error name="name" />
                </div>
                </div>

                <div class="sm:col-span-4">
                <x-form-label for="email">Email</x-form-label>
                <div class="mt-2">
                    <x-form-input name="email" id="email" placeholder="naruto@example.com" value="{{ old('email') }}" />
                    <x-form-error name="email" />
                </div>
                </div>

                <div class="sm:col-span-4">
                <x-form-label for="password">Password</x-form-label>
                <div class="mt-2">
                    <x-form-input type="password" name="password" id="password" placeholder="Password" />
                    <x-form-error name="password" />
                </div>
                </div>

                <div class="sm:col-span-4">
                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                <div class="mt-2">
                    <x-form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password" />
                    <x-form-error name="password_confirmation" />
                </div>
                </div>
                
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-white">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layout>


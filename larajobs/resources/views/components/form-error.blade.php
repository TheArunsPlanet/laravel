@props(['name'])

@error($name)
    <p class="text-xs mt-1 text-sm/6 text-red-500">{{ $message }}</p>
@enderror

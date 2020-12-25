@props(['name', 'slug', 'cover', 'releaseDate'])

<div class="game flex justify-center md:justify-start">
    <div class="flex-none">
        <a href="{{ route('games.show', $slug) }}">
            <img
                class="hover:opacity-75 transition ease-in-out duration-300 w-24"
                src="{{ $cover }}"
                alt="game cover"
            >
        </a>
    </div>
    <div class="ml-4">
        <a href="{{ route('games.show', $slug) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-2">{{ $name }}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $releaseDate }}
        </div>
    </div>
</div>

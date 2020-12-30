@props(['name', 'slug', 'cover', 'rating', 'platforms'])

<div class="game mt-6 text-center md:text-left">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $slug) }}">
            <img
                class="hover:opacity-75 transition ease-in-out duration-300"
                src="{{ $cover }}"
                alt="game cover"
            >
        </a>
        @if($rating)
            <div
                id="{{ $slug }}"
                class="absolute w-16 h-16 bg-gray-800 rounded-full"
                style="right: -20px; bottom: -20px;"
            >
                @push('scripts')
                    @include('_rating', [
                        'slug' => $slug,
                        'rating' => $rating,
                        'event' => null,
                    ])
                @endpush
            </div>
        @endif
    </div>
    <a href="{{ route('games.show', $slug) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{!! $name !!}</a>
    <div class="text-gray-400 mt-1">
        {{ $platforms }}
    </div>
</div>

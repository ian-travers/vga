@props(['name', 'cover', 'rating', 'platforms', 'summary'])

<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
    <div class="relative flex-none">
        <a href="#">
            <img
                class="hover:opacity-75 transition ease-in-out duration-300 w-48"
                src="{{ Str::replaceFirst('thumb', 'cover_big', $cover) }}"
                alt="game cover"
            >
        </a>
        @if($rating)
            <div
                class="absolute w-16 h-16 bg-gray-900 rounded-full"
                style="right: -20px; bottom: -20px;"
            >
                <div class="flex items-center justify-center font-semibold text-xs  h-full">
                    {{ $rating }}
                </div>
            </div>
        @endif
    </div>
    <div class="ml-8">
        <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{!! $name !!}</a>
        <div class="text-gray-400 mt-1">
            @foreach(json_decode($platforms) as $platform)
            {{ $platform->abbreviation ?? '' }} &middot;
            @endforeach
        </div>
        <p class="text-gray-400 mt-6 hidden md:block">{!! $summary !!}</p>
    </div>
</div>

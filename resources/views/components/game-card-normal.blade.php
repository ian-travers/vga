@props(['name', 'cover', 'platforms'])

<div class="game mt-6 text-center md:text-left">
    <div class="relative inline-block">
        <a href="#">
            <img
                class="hover:opacity-75 transition ease-in-out duration-300"
                src="{{ Str::replaceFirst('thumb', 'cover_big', $cover) }}"
                alt="game cover"
            >
        </a>
        <div
            class="absolute w-16 h-16 bg-gray-800 rounded-full"
            style="right: -20px; bottom: -20px;"
        >
            <div class="flex items-center justify-center font-semibold text-xs  h-full">15%</div>
        </div>
    </div>
    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{!! $name !!}</a>
    <div class="text-gray-400 mt-1">
        @foreach(json_decode($platforms) as $platform)
            {{ $platform->abbreviation ?? '' }} &middot;
        @endforeach
    </div>
</div>

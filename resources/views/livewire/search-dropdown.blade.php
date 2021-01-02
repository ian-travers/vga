<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input
        wire:model.debounce.300ms="search"
        type="text"
        class="w-64 bg-gray-800 text-sm rounded-full focus:outline-none px-3 py-1 pl-8"
        placeholder="Search..."
        @focus="isVisible = true"
        @keydown.escape.window="isVisible = false"
        @keydown="isVisible = true"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg viewBox="0 0 20 20" class="w-4">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g fill="#aaaaaaaa">
                    <path
                        d="M12.9056439,14.3198574 C11.5509601,15.3729184 9.84871145,16 8,16 C3.581722,16 0,12.418278 0,8 C0,3.581722 3.581722,0 8,0 C12.418278,0 16,3.581722 16,8 C16,9.84871145 15.3729184,11.5509601 14.3198574,12.9056439 L19.6568542,18.2426407 L18.2426407,19.6568542 L12.9056439,14.3198574 Z M8,14 C11.3137085,14 14,11.3137085 14,8 C14,4.6862915 11.3137085,2 8,2 C4.6862915,2 2,4.6862915 2,8 C2,11.3137085 4.6862915,14 8,14 Z"
                    ></path>
                </g>
            </g>
        </svg>
    </div>

    <div wire:loading class="absolute top-0 right-0 mt-1">
        <x-spinner></x-spinner>
    </div>


    @if(strlen($search) > 2)
        <div class="absolute z-50 bg-gray-800 text-sm w-64 mt-2 rounded-lg py-2"  x-show="isVisible">
            @if(count($searchResults) > 0)
                <ul class="divide-y divide-blue-400">
                    @foreach($searchResults as $game)
                        <li class="">
                            <a
                                href="{{ route('games.show', $game['slug']) }}"
                                class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-300"
                            >
                                @if(isset($game['cover']))
                                    <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
                                         alt="cover" class="w-10">
                                @else
                                    <img src="https://via.placeholder.com/46x60?text=No+Cover" alt="cover" class="w-10">
                                @endif
                                <span class="ml-6">{{ $game['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>

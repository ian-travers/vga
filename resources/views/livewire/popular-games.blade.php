<div
    wire:init="loadPopularGames"
    class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 text-sm gap-12 border-b border-gray-800 pb-12"
>
    @forelse($popularGames as $game)
        <x-game-card-normal
            name="{{ $game['name'] }}"
            cover="{{ $game['cover']['url'] }}"
            rating="{{ isset($game['rating']) ? round($game['rating']) . '%' : '' }}"
            platforms="{!! json_encode($game['platforms']) !!}"
        ></x-game-card-normal>
    @empty
        <x-spinner></x-spinner>
    @endforelse
</div>

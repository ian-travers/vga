<div
    wire:init="loadPopularGames"
    class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 text-sm gap-12 border-b border-gray-800 pb-12"
>
    @forelse($popularGames as $game)
        <x-game-card-normal
            name="{{ $game['name'] }}"
            slug="{{ $game['slug'] }}"
            cover="{{ $game['coverUrl'] }}"
            rating="{{ $game['rating'] }}"
            platforms="{{ $game['platforms'] }}"
        ></x-game-card-normal>
    @empty
        @foreach(range(1, 12) as $i)
            <x-game-card-normal-placeholder></x-game-card-normal-placeholder>
        @endforeach
    @endforelse

    @push('scripts')
        @include('_rating', [
            'event' => 'gameWithRatingAdded'
        ])
    @endpush
</div>

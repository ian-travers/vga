<div
    wire:init="loadMostAnticipated"
    class="space-y-8 mt-8"
>
    @forelse($mostAnticipated as $game)
        <x-game-card-small
            name="{{ $game['name'] }}"
            slug="{{ $game['slug'] }}"
            cover="{{ $game['coverUrl'] }}"
            releaseDate="{{ $game['releaseDate'] }}"
        ></x-game-card-small>
    @empty
        @foreach(range(1, 3) as $i)
            <x-game-card-small-placeholder></x-game-card-small-placeholder>
        @endforeach
    @endforelse
</div>

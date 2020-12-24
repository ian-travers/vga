<div
    wire:init="loadMostAnticipated"
    class="space-y-8 mt-8"
>
    @forelse($mostAnticipated as $game)
        <x-game-card-small
            name="{{ $game['name'] }}"
            cover="{{ $game['cover']['url'] }}"
            releaseDate="{{ \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}"
        ></x-game-card-small>
    @empty
        <x-spinner></x-spinner>
    @endforelse
</div>

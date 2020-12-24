<div
    wire:init="loadRecentlyReviewed"
    class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32"
>
    <h2 class="text-blue-500 uppercase tracking-wide font-bold">Recently Reviewed</h2>
    <div class="space-y-12 mt-8">
        @forelse($recentlyReviewed as $game)
            <x-game-card-wide
                name="{{ $game['name'] }}"
                cover="{{ $game['cover']['url'] }}"
                rating="{{ isset($game['rating']) ? round($game['rating']) . '%' : '' }}"
                platforms="{!! json_encode($game['platforms']) !!}"
                summary="{{ $game['summary'] }}"
            ></x-game-card-wide>
        @empty
            Loading...
        @endforelse
    </div>
</div>
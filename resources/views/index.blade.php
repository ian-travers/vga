<x-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        <div
            class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 text-sm gap-12 border-b border-gray-800 pb-12">
            @foreach($popularGames as $game)
                <x-game-card-normal
                    name="{{ $game['name'] }}"
                    cover="{{ $game['cover']['url'] }}"
                    rating="{{ isset($game['rating']) ? round($game['rating']) . '%' : '' }}"
                    platforms="{!! json_encode($game['platforms']) !!}"
                ></x-game-card-normal>
            @endforeach
        </div> <!-- end popular games -->

        <div class="flex flex-col lg:flex-row my-6">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Recently Reviewed</h2>
                <div class="space-y-12 mt-8">
                    @foreach($recentlyReviewed as $game)
                        <x-game-card-wide
                            name="{{ $game['name'] }}"
                            cover="{{ $game['cover']['url'] }}"
                            rating="{{ isset($game['rating']) ? round($game['rating']) . '%' : '' }}"
                            platforms="{!! json_encode($game['platforms']) !!}"
                            summary="{{ $game['summary'] }}"
                        ></x-game-card-wide>
                    @endforeach
                </div>
            </div>
            <div class="w-full lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Most Anticipated</h2>
                <div class="space-y-8 mt-8">
                    <x-game-card-small></x-game-card-small>
                    <x-game-card-small></x-game-card-small>
                    <x-game-card-small></x-game-card-small>
                </div>

                <h2 class="mt-12 text-blue-500 uppercase tracking-wide font-bold">Coming Soon</h2>
                <div class="space-y-8 mt-8">
                    <x-game-card-small></x-game-card-small>
                    <x-game-card-small></x-game-card-small>
                    <x-game-card-small></x-game-card-small>
                </div>
            </div>
        </div>
    </div>
</x-layout>

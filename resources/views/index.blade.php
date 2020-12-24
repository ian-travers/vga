<x-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        @livewire('popular-games')

        <div class="flex flex-col lg:flex-row my-6">
            @livewire('recently-reviewed')

            <div class="w-full lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Most Anticipated</h2>
                <div class="space-y-8 mt-8">
                    @foreach($mostAnticipated as $game)
                        <x-game-card-small
                            name="{{ $game['name'] }}"
                            cover="{{ $game['cover']['url'] }}"
                            releaseDate="{{ \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}"
                        ></x-game-card-small>
                    @endforeach
                </div>

                <h2 class="mt-12 text-blue-500 uppercase tracking-wide font-bold">Coming Soon</h2>
                <div class="space-y-8 mt-8">
                    @foreach($comingSoon as $game)
                        <x-game-card-small
                            name="{{ $game['name'] }}"
                            cover="{{ $game['cover']['url'] }}"
                            releaseDate="{{ \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}"
                        ></x-game-card-small>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>

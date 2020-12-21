<x-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        <div class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 text-sm gap-12 border-b border-gray-800 pb-12">
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
        </div> <!-- end popular games -->

        <div class="flex flex-col lg:flex-row my-6">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Recently Reviewed</h2>
                <div class="space-y-12 mt-8">
                    <x-game-card-wide></x-game-card-wide>
                    <x-game-card-wide></x-game-card-wide>
                    <x-game-card-wide></x-game-card-wide>
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


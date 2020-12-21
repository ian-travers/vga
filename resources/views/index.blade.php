<x-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        <div class="popular-games grid grid-cols-6 text-sm gap-12 border-b border-gray-800 pb-12">
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
            <x-game-card-normal></x-game-card-normal>
        </div> <!-- end popular games -->

        <div class="flex my-6">
            <div class="recently-reviewed w-3/4 mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Recently Reviewed</h2>
                <div class="space-y-12 mt-8">
                    <x-game-card-wide></x-game-card-wide>
                    <x-game-card-wide></x-game-card-wide>
                    <x-game-card-wide></x-game-card-wide>
                </div>
            </div>
            <div class="most-anticipated w-1/4">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold"></h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi distinctio dolore et ipsam, labore modi nobis nostrum sed. Accusamus, ad aspernatur doloribus eligendi excepturi explicabo mollitia nam, nisi pariatur provident quas quo, similique.
            </div>
        </div>
    </div>
</x-layout>


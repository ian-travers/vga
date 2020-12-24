<x-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-bold">Popular Games</h2>
        @livewire('popular-games')

        <div class="flex flex-col lg:flex-row my-6">
            @livewire('recently-reviewed')

            <div class="w-full lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-bold">Most Anticipated</h2>
                @livewire('most-anticipated')

                <h2 class="mt-12 text-blue-500 uppercase tracking-wide font-bold">Coming Soon</h2>
                @livewire('coming-soon')
            </div>
        </div>
    </div>
</x-layout>

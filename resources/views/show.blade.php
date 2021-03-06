<x-layout>
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-8 flex flex-col md:flex-row">
            <div class="flex-none self-center">
                <img src="{{ $game['cover'] }}" alt="cover">
            </div>
            <div class="md:ml-4 lg:ml-12 lg:mr-64 text-center md:text-left">
                <h2 class="font-semibold text-4xl leading-tight mt-2 md:mt-0">{{ $game['name'] }}</h2>
                <div class="text-gray-400">
                    <span>
                        {{ $game['genres'] }}
                    </span>
                    &nbsp;&middot;&nbsp;
                    <span>
                        {{ $game['company'] }}
                    </span>
                    &nbsp;&middot;&nbsp;
                    <span>
                        {{ $game['platforms'] }}
                    </span>
                </div>

                <div class="flex flex-col md:flex-row items-center mt-4 md:mt-8">
                    <div class="flex">
                        <div class="flex items-center">
                            <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('_rating', [
                                        'slug' => 'memberRating',
                                        'rating' => $game['rating'],
                                        'event' => null,
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Member<br>Score</div>
                        </div>
                        <div class="flex items-center ml-12">
                            <div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('_rating', [
                                        'slug' => 'criticRating',
                                        'rating' => $game['aggregated_rating'],
                                        'event' => null,
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Critic<br>Score</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 md:ml-4 lg:ml-12 mt-4 lg:mt-0">
                        <div class="w-8 h-8 bg-gray-800 flex items-center justify-center rounded-full">
                            <a href="#">
                                <svg class="w-5 h-5">
                                    <g fill-rule="evenodd">
                                        <g fill="white">
                                            <path
                                                d="M17.747965,12 C17.912494,11.3607602 18,10.6905991 18,10 C18,9.30940086 17.912494,8.63923984 17.747965,8 L13.9319635,8 C13.9770158,8.64627227 14,9.31512813 14,10 C14,10.6848719 13.9770158,11.3537277 13.9319635,12 L17.747965,12 L17.747965,12 Z M16.9297424,14 C15.9997274,15.6077187 14.5262862,16.8617486 12.7605851,17.5109236 C13.1807787,16.5491202 13.5012461,15.3524505 13.7109556,14 L16.9297424,14 L16.9297424,14 Z M8.08134222,12 C8.02912147,11.3608387 8,10.6906922 8,10 C8,9.30930775 8.02912147,8.63916129 8.08134222,8 L11.9186578,8 C11.9708785,8.63916129 12,9.30930775 12,10 C12,10.6906922 11.9708785,11.3608387 11.9186578,12 L8.08134222,12 L8.08134222,12 Z M8.33245212,14 C8.74471091,16.3918507 9.45909367,18 10,18 C10.5409063,18 11.2552891,16.3918507 11.6675479,14 L8.33245212,14 L8.33245212,14 Z M2.25203497,12 C2.08750601,11.3607602 2,10.6905991 2,10 C2,9.30940086 2.08750601,8.63923984 2.25203497,8 L6.06803651,8 C6.02298421,8.64627227 6,9.31512813 6,10 C6,10.6848719 6.02298421,11.3537277 6.06803651,12 L2.25203497,12 L2.25203497,12 Z M3.07025756,14 C4.00027261,15.6077187 5.47371379,16.8617486 7.23941494,17.5109236 C6.81922128,16.5491202 6.49875389,15.3524505 6.28904438,14 L3.07025756,14 L3.07025756,14 Z M16.9297424,6 C15.9997274,4.39228131 14.5262862,3.13825137 12.7605851,2.48907637 C13.1807787,3.45087984 13.5012461,4.64754949 13.7109556,6 L16.9297424,6 L16.9297424,6 Z M8.33245212,6 C8.74471091,3.60814928 9.45909367,2 10,2 C10.5409063,2 11.2552891,3.60814928 11.6675479,6 L8.33245212,6 L8.33245212,6 Z M3.07025756,6 C4.00027261,4.39228131 5.47371379,3.13825137 7.23941494,2.48907637 C6.81922128,3.45087984 6.49875389,4.64754949 6.28904438,6 L3.07025756,6 L3.07025756,6 Z M10,20 C15.5228475,20 20,15.5228475 20,10 C20,4.4771525 15.5228475,0 10,0 C4.4771525,0 0,4.4771525 0,10 C0,15.5228475 4.4771525,20 10,20 L10,20 Z"
                                                id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="mt-4 md:mt-12">
                    {{ $game['summary'] }}
                </p>
                <div
                    class="mt-4 md:mt-12 flex justify-center md:justify-start"
                    x-data="{ isTrailerModalVisible: false }"
                >
                    @if($game['videos'])
                        <button
                            class="flex bg-blue-500 text-white font-semibold px-4 py-4 rounded hover:bg-blue-600 transition ease-in-out duration-300"
                            @click="isTrailerModalVisible = true"
                        >
                            <svg class="w-6 h-6">
                                <g fill-rule="evenodd">
                                    <g fill="white">
                                        <path
                                            d="M2.92893219,17.0710678 C6.83417511,20.9763107 13.1658249,20.9763107 17.0710678,17.0710678 C20.9763107,13.1658249 20.9763107,6.83417511 17.0710678,2.92893219 C13.1658249,-0.976310729 6.83417511,-0.976310729 2.92893219,2.92893219 C-0.976310729,6.83417511 -0.976310729,13.1658249 2.92893219,17.0710678 L2.92893219,17.0710678 Z M15.6568542,15.6568542 C18.7810486,12.5326599 18.7810486,7.46734008 15.6568542,4.34314575 C12.5326599,1.21895142 7.46734008,1.21895142 4.34314575,4.34314575 C1.21895142,7.46734008 1.21895142,12.5326599 4.34314575,15.6568542 C7.46734008,18.7810486 12.5326599,18.7810486 15.6568542,15.6568542 Z M7,6 L15,10 L7,14 L7,6 Z"
                                            id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                        <!-- Video Modal window  -->
                        <template x-if="isTrailerModalVisible">
                            <div
                                style="background-color: rgba(0, 0, 0, .5)"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isTrailerModalVisible = false"
                                                @keydown.escape.window="isTrailerModalVisible = false"
                                                class="text-3xl leading-none hover:text-gray-300"
                                            >
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div
                                                class="responsive-container overflow-hidden relative"
                                                style="padding-top: 56.25%"
                                            >
                                                <iframe
                                                    width="560"
                                                    height="315"
                                                    class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                                    src="{{ $game['video'] }}"
                                                    style="border:0;"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen
                                                ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template><!-- End of Video Modal window  -->

                    @else
                        <button
                            class="flex bg-blue-500 text-white font-semibold px-4 py-4 rounded hover:bg-blue-600 transition ease-in-out duration-300"
                        >
                            <svg class="w-6 h-6">
                                <g fill-rule="evenodd">
                                    <g fill="white">
                                        <path
                                            d="M2.92893219,17.0710678 C6.83417511,20.9763107 13.1658249,20.9763107 17.0710678,17.0710678 C20.9763107,13.1658249 20.9763107,6.83417511 17.0710678,2.92893219 C13.1658249,-0.976310729 6.83417511,-0.976310729 2.92893219,2.92893219 C-0.976310729,6.83417511 -0.976310729,13.1658249 2.92893219,17.0710678 L2.92893219,17.0710678 Z M15.6568542,15.6568542 C18.7810486,12.5326599 18.7810486,7.46734008 15.6568542,4.34314575 C12.5326599,1.21895142 7.46734008,1.21895142 4.34314575,4.34314575 C1.21895142,7.46734008 1.21895142,12.5326599 4.34314575,15.6568542 C7.46734008,18.7810486 12.5326599,18.7810486 15.6568542,15.6568542 Z M7,6 L15,10 L7,14 L7,6 Z"
                                            id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    @endif
                </div>
            </div>
        </div><!-- end game-details -->

        <div
            class="images-container border-b border-gray-800 pb-12 mt-8"
            x-data="{ isImageModalVisible: false, image: '' }"
        >
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">Images</h2>
            <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-6">
                @foreach($game['screenshots'] as $screenshot)
                    <x-screenshot
                        url="{{ $screenshot['url'] }}">

                    </x-screenshot>
                @endforeach
            </div>
            <!-- Image Modal Window -->
            <template x-if="isImageModalVisible">
                <div
                    style="background-color: rgba(0, 0, 0, .5)"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    class="text-3xl leading-none hover:text-gray-300"
                                    @click="isImageModalVisible = false"
                                    @keydown.escape.window="isImageModalVisible = false"
                                >
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="screenshot">
                            </div>
                        </div>
                    </div>
                </div>
            </template> <!-- End of Image Modal Window -->
        </div><!-- end images-container -->

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-bold">Similar Games</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @forelse($game['similar_games'] as $game)
                    <x-game-card-normal
                        name="{{ $game['name'] }}"
                        slug="{{ $game['slug'] }}"
                        cover="{{ $game['cover'] }}"
                        rating="{{ $game['rating'] }}"
                        platforms="{{ $game['platforms'] }}"
                    ></x-game-card-normal>
                @empty
                    Not found.
                @endforelse
            </div>
        </div><!-- end similar-games-container -->
    </div>
</x-layout>

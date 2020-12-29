<?php

namespace Tests\Feature;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /** @test */
    function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            config('services.igdb.endpoint') => $this->fakeSingleGame(),
        ]);

        $this->get(route('games.show', 'fake-pikmin-3-deluxe'))
            ->assertSuccessful()
            ->assertSee('Pikmin 3 Deluxe')
            ->assertSee('Strategy')
            ->assertSee('Switch')
            ->assertSee('Prepare yourselves, brave explorers! Set-off for the lush planet PNF-404 when Pikmin 3 Deluxe lands on October 30!');
    }

    protected function fakeSingleGame(): PromiseInterface
    {
        return Http::response([
            [
                "id" => 136498,
                "aggregated_rating" => 86.090909090909,
                "cover" => [
                    "id" => 118699,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2jl7.jpg"
                ],
                "first_release_date" => 1604016000,
                "genres" => [
                    [
                        "id" => 15,
                        "name" => "Strategy"
                    ],
                    [
                        "id" => 31,
                        "name" => "Adventure"
                    ]
                ],
                "involved_companies" => [
                    [
                        "id" => 105257,
                        "company" => [
                            "id" => 70,
                            "name" => "Nintendo"
                        ]
                    ]
                ],
                "name" => "Pikmin 3 Deluxe",
                "platforms" => [
                    [
                        "id" => 130,
                        "abbreviation" => "Switch"
                    ]
                ],
                "screenshots" => [
                    [
                        "id" => 395178,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gx6",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gx6.jpg",
                        "width" => 1280,
                        "checksum" => "887e9bfe-d759-5f60-f6a2-a8e2e4d69db4"
                    ],
                    [
                        "id" => 395179,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gx7",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gx7.jpg",
                        "width" => 1280,
                        "checksum" => "3c179cbb-1ac2-cf49-2c90-f4cdb00a7698"
                    ],
                    [
                        "id" => 395180,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gx8",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gx8.jpg",
                        "width" => 1280,
                        "checksum" => "e5a757bd-26f7-5f69-cc66-9eda56577cc0"
                    ],
                    [
                        "id" => 395181,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gx9",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gx9.jpg",
                        "width" => 1280,
                        "checksum" => "7c74f3e9-1937-6454-ae5f-11aad7efa30d"
                    ],
                    [
                        "id" => 395182,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gxa",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gxa.jpg",
                        "width" => 1280,
                        "checksum" => "b5627cfb-ca8d-6df4-ef27-026d274b87c3"
                    ],
                    [
                        "id" => 395183,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 136498,
                        "height" => 720,
                        "image_id" => "sc8gxb",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8gxb.jpg",
                        "width" => 1280,
                        "checksum" => "af792cae-0dee-9eb2-6688-e5f0634ae051"
                    ]
                ],
                "similar_games" => [
                    [
                        "id" => 25311,
                        "cover" => [
                            "id" => 68395,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/rmzcpsfvnizymkhvd0qg.jpg"
                        ],
                        "name" => "Star Control: Origins",
                        "platforms" => [
                            [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ]
                        ],
                        "rating" => 79.766252739226,
                        "slug" => "star-control-origins",
                    ],
                    [
                        "id" => 37419,
                        "cover" => [
                            "id" => 107550,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2azi.jpg"
                        ],
                        "name" => "Dude Simulator",
                        "platforms" => [
                            [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ]
                        ],
                        "rating" => 79.911633494131,
                        "slug" => "dude-simulator"
                    ],
                    [
                        "id" => 78632,
                        "name" => "Untitled Danganronpa Game",
                        "platforms" => [
                            [
                                "id" => 46,
                                "abbreviation" => "Vita"
                            ],
                            [
                                "id" => 48,
                                "abbreviation" => "PS4"
                            ]
                        ],
                        "slug" => "untitled-danganronpa-game"
                    ],
                    [
                        "id" => 87622,
                        "cover" => [
                            "id" => 77819,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1o1n.jpg"
                        ],
                        "name" => "Garena Free Fire",
                        "platforms" => [
                            [
                                "id" => 34,
                                "abbreviation" => "Android",
                            ],
                            [
                                "id" => 39,
                                "abbreviation" => "iOS"
                            ]
                        ],
                        "rating" => 78.555240793201,
                        "slug" => "garena-free-fire"
                    ],
                    [
                        "id" => 103292,
                        "cover" => [
                            "id" => 111906,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2eci.jpg",
                        ],
                        "name" => "Gears 5",
                        "platforms" => [
                            [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ],
                            [
                                "id" => 49,
                                "abbreviation" => "XONE"
                            ],
                            [
                                "id" => 169,
                                "abbreviation" => "Series X"
                            ]
                        ],
                        "rating" => 81.104843657175,
                        "slug" => "gears-5"
                    ],


                ],
                "slug" => "pikmin-3-deluxe",
                "summary" => "Prepare yourselves, brave explorers! Set-off for the lush planet PNF-404 when Pikmin 3 Deluxe lands on October 30! This new version for Nintendo Switch features multiple difficulty modes, new side-story missions featuring Olimar and Louie, and all the DLC from the original release.",
                "total_rating_count" => 13,
                "videos" => [
                    [
                        "id" => 39207,
                        "game" => 136498,
                        "name" => "Announcement Trailer",
                        "video_id" => "aSSQ0Z6eDhU",
                        "checksum" => "62bded6a-dbce-4f7c-cbd2-01d35e150c07"
                    ]
                ],
                "websites" => [
                    [
                        "id" => 161776,
                        "category" => 1,
                        "game" => 136498,
                        "trusted" => false,
                        "url" => "https://pikmin3.nintendo.com/",
                        "checksum" => "d3eb781d-9311-2855-64bd-52618e5cae9a"
                    ]
                ],
            ]
        ], 200);
    }
}

<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    /** @test */
    function the_search_dropdown_searches_for_games()
    {
        Http::fake([
            config('services.igdb.endpoint') => $this->fakeSearchGames(),
        ]);

        Livewire::test(SearchDropdown::class)
            ->assertDontSee('need for speed underground')
            ->set('search', 'need for speed underground')
            ->assertSee('Need for Speed: Underground 2');

    }

    protected function fakeSearchGames()
    {
        return Http::response([
                0 => [
                    "id" => 96,
                    "cover" => [
                        "id" => 93652,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co209g.jpg"
                    ],
                    "name" => "Need for Speed: Underground",
                    "slug" => "need-for-speed-underground"
                ],
                1 => [
                    "id" => 97,
                    "cover" => [
                        "id" => 93653,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co209h.jpg"
                    ],
                    "name" => "Need for Speed: Underground 2",
                    "slug" => "need-for-speed-underground-2"
                ],
                2 => [
                    "id" => 22509,
                    "cover" => [
                        "id" => 93669,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co209x.jpg"
                    ],
                    "name" => "Need For Speed: Underground - Rivals",
                    "slug" => "need-for-speed-underground-rivals"
                ]
            ]


            , 200);
    }
}

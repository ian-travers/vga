<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show(string $slug)
    {
        $game = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization')
        ])
            ->withBody("
fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating,
 slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*,
 videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating,
 similar_games.platforms.abbreviation, similar_games.slug;
  where slug = \"{$slug}\";
  limit 1;
            ", 'text/plain')
            ->post(config('services.igdb.endpoint'))
            ->json();

        abort_if(!$game, 404);

        return view('show', [
            'game' => $game[0]
        ]);
    }
}

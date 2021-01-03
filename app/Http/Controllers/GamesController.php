<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
            'game' => $this->formatGameForView($game[0]),
        ]);
    }

    private function formatGameForView(array $game)
    {
        return collect($game)->merge([
            'cover' => key_exists('cover', $game)
                ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                : 'https://via.placeholder.com/200x300?text=No+Cover',
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'company' => $game['involved_companies'][0]['company']['name'],
            'platforms' => key_exists('platforms', $game)
                ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                : null,
            'rating' => key_exists('rating', $game)
                ? round($game['rating'])
                : '0',
            'aggregated_rating' => key_exists('aggregated_rating', $game)
                ? round($game['aggregated_rating'])
                : '0',
            'video' => key_exists('videos', $game)
                ? 'https://youtube.com/embed/' . $game['videos'][0]['video_id']
                : null,
            'screenshots' => key_exists('screenshots', $game)
                ? collect($game['screenshots'])->map(function ($screenshot) {
                    return [
                        'url' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])
                    ];
                })->take(9)
                : [],
            'similar_games' => collect($game['similar_games'])->map(function ($game) {
                return [
                    'name' => $game['name'],
                    'slug' => $game['slug'],
                    'cover' => key_exists('cover', $game)
                        ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                        : 'https://via.placeholder.com/200x300?text=No+Cover',
                    'rating' => key_exists('rating', $game)
                        ? round($game['rating'])
                        : null,
                    'platforms' => key_exists('platforms', $game)
                        ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                        : null,
                ];
            })->take(6),
        ]);
    }
}

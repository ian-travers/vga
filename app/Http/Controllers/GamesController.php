<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $popularGames = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization')
        ])
            ->withBody("
fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
  where platforms = (48,49,130,6) & total_rating_count > 5
    & (first_release_date >= {$before} & first_release_date < {$after});
  sort total_rating_count desc;
  limit 12;
            ", 'text/plain')
            ->post(config('services.igdb.endpoint'))
            ->json();

        $recentlyReviewed = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization')
        ])
            ->withBody("
fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;
  where platforms = (48,49,130,6) & total_rating_count > 5
    & (first_release_date >= {$before} & first_release_date < {$current} & rating_count > 5);
  sort total_rating_count desc;
  limit 3;
            ", 'text/plain')
            ->post(config('services.igdb.endpoint'))
            ->json();

        dump($recentlyReviewed);

        return view('index', compact('popularGames', 'recentlyReviewed'));
    }

    public function show($id)
    {
        //
    }
}

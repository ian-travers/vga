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
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

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

        $mostAnticipated = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization')
        ])
            ->withBody("
fields name, cover.url, first_release_date, total_rating_count, rating, rating_count, summary, slug;
  where platforms = (48,49,130,6) & (first_release_date >= {$current} & first_release_date < {$afterFourMonths});
  sort total_rating_count desc;
  limit 3;
            ", 'text/plain')
            ->post(config('services.igdb.endpoint'))
            ->json();

        $comingSoon = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
            'Authorization' => config('services.igdb.authorization')
        ])
            ->withBody("
fields name, cover.url, first_release_date, total_rating_count, rating, rating_count, summary, slug;
  where platforms = (48,49,130,6) & total_rating_count > 1 & (first_release_date >= {$current});
  sort first_release_date asc;
  limit 3;
            ", 'text/plain')
            ->post(config('services.igdb.endpoint'))
            ->json();

        return view('index', compact('popularGames', 'recentlyReviewed', 'mostAnticipated', 'comingSoon'));
    }

    public function show($id)
    {
        //
    }
}

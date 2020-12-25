<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed', 7, function () use($before, $current) {
            return Http::withHeaders([
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
        });

        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);
    }

    protected function formatForView(array $games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverUrl' => key_exists('cover', $game)
                    ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                    : 'https://via.placeholder.com/200x300?text=No+Cover',
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => key_exists('platforms', $game)
                    ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                    : null,
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}

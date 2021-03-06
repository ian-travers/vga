<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class PopularGames extends Component
{
    use PrepareForNormalView;

    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use ($before, $after) {
            return Http::withHeaders([
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
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);

        collect($this->popularGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}

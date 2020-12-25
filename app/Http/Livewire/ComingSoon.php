<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $comingSoonUnformatted = Cache::remember('coming-soon', 7, function () use($current) {
            return Http::withHeaders([
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
        });

        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }

    protected function formatForView(array $games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverUrl' => key_exists('cover', $game)
                    ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url'])
                    : 'https://via.placeholder.com/100x130?text=No+Cover',
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y')
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}

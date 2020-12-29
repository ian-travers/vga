<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipated extends Component
{
    use PrepareForShortView;

    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 7, function () use ($current, $afterFourMonths) {
            return Http::withHeaders([
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
        });

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}

<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait PrepareForShortView
{
    protected function formatForView(array $games):array
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
}

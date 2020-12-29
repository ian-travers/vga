<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

trait PrepareForNormalView
{
    protected function formatForView(array $games): array
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
}

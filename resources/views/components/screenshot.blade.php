@props(['url'])

<div>
    <a href="{{ Str::replaceFirst('_big', '_huge', $url) }}">
        <img
            src="{{ $url }}"
            class="hover:opacity-75 transition ease-in-out duration-300"
            alt="screenshot"
        >
    </a>
</div>

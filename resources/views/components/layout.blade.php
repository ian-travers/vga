<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Game Aggregator</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    @livewireStyles
</head>
<body class="bg-gray-900 text-white">
<x-header></x-header>

<main class="px-4 py-6">
    {{ $slot }}
</main>

<x-footer></x-footer>
<script src="{{ mix('js/app.js', 'build') }}"></script>
@livewireScripts
</body>
</html>

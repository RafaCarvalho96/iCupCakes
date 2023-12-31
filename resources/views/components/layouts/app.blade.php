<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>

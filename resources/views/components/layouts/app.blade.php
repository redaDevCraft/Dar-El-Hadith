<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name') }}</title>


    <style>
    [x-cloak] {
        display: none !important;
    }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased min-h-screen flex flex-col tajawal-regular" style="background-image: url('images/mainBackground3.jpg');
background-size : contain
">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1.5.0/lite-youtube.js"></script>

    <livewire:partials.nav-bar />
    <div class=" justify-center lg:max-w-full ">
        {{ $slot }}
    </div>
    <livewire:partials.footer />

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
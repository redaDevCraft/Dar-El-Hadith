<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Primary Meta -->
    <title>{{ config('app.name', 'Dar El Hadith') }}</title>
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="description"
        content="دار الحديث بتلمسان، مؤسسة تابعة لجمعية العلماء المسلمين الجزائريين، تضم مسجدًا، مدرسة قرآنية وتحضيرية، مكتبة، مسرح، وتساهم في بناء المجتمع عبر نشاطات علمية واجتماعية." />

    <!-- Open Graph / Facebook -->
    <!-- <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description"
        content="مؤسسة علمية وثقافية بتلمسان، الجزائر. المسجد، المدرسة، المكتبة، المسرح، والنشاطات الاجتماعية." />
    <meta property="og:image" content="{{ asset('images/OpenDay3.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" /> -->

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ config('app.name') }}" />
    <meta name="twitter:description" content="دار الحديث تلمسان - مؤسسة تعليمية وثقافية واجتماعية." />
    <meta name="twitter:image" content="{{ asset('images/OpenDay3.jpg') }}" />

    <!-- Favicon & Theme -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <meta name="theme-color" content="#065f46" />

    <!-- Preload / Prefetch -->
    <link rel="preload" href="{{ asset('images/OpenDay3.jpg') }}" as="image" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Styles -->
    <style>
    [x-cloak] {
        display: none !important;
    }
    </style>
    @livewireStyles

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased min-h-screen flex flex-col tajawal-regular bg-gray-50 text-gray-900">
    <!-- YouTube Lite Component -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1.5.0/lite-youtube.js"></script>

    <!-- Header -->
    <header>
        <livewire:partials.nav-bar />
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <livewire:partials.footer />
    </footer>

    <!-- Scripts -->
    @livewireScripts

    @filamentScripts
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')

</body>

</html>
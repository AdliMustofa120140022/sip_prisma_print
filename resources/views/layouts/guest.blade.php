<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ $title }} - percetakan prima Printing</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @if (isset($head))
        {{ $head }}
    @endif
    <x-utils.user-metas-x-demo />
    <x-utils.meta-seo />

</head>

<body class="min-h-screen flex  flex-1 flex-col">
    @if (session('success') || session('error'))
        <x-user-toaster type="{{ session('success') ? 'success' : 'error' }}" :message="session('success') ?? session('error')" />
    @endif

    <x-wa-toas />

    <x-user-navbar />

    <main class='container mx-auto pt-4 flex flex-1 flex-col  '>
        {{ $slot }}
    </main>

    <x-layouts.user-footer />

    <x-utils.user-scripts-x-demo />

    <script src="{{ asset('assets/js/jquery-3.7.1.slim.min.js') }}"></script>

    @if (isset($scripts))
        {{ $scripts }}
    @endif
</body>

</html>

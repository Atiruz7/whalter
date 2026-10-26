<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? config('site.brand.name') }}</title>
    <meta name="description" content="{{ $pageDescription ?? config('site.brand.tagline') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-blanco text-azul-900 antialiased">
    @include('partials.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>

</html>

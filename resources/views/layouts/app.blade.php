<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="XSRF-TOKEN">

        <meta name="current-user-id" content="{{ auth()->id() }}" />
        <meta name="current-team-id" content="{{ optional(auth()->user()->currentTeam)->id }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" data-turbo-track="reload" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script data-turbo-track="reload" src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('demo-heading')

            <div id="app-navigation" data-turbo-permanent class="hidden md:block">
                @livewire('navigation-menu')
            </div>

            <!-- Page Heading -->
            @isset($header)
            <header class="hidden bg-white shadow md:block">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.4/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>

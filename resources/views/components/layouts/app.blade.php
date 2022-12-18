<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('Compendium') }}</title>

        <script src='https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css' rel='stylesheet' />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body 
      class="antialiased" 
      x-data="{'darkMode': true}" 
      x-init="
      darkMode = JSON.parse(localStorage.getItem('darkMode')); 
      $watch('darkMode', value => localStorage.setItem('darkMode' , JSON.stringify(value)));
    ">
        <div :class="{'dark': darkMode === true}">
        <div class="min-h-screen bg-stone-100 dark:bg-stone-900" 
          >
          <x-navigation />
            <!-- Page Heading -->
            @if (isset($header))
                <header class="text-center">
                    <h1 class="text-4xl text-gray-800 dark:text-gray-300 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </h1>
                </header>
            @endif

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>
        </div>
        </div>
    @livewireScripts
    @stack('scripts')
    </body>
</html>

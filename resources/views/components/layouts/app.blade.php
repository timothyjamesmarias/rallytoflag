<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('Compendium') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <main>
                {{ $slot }}
            </main>
        </div>
        </div>
    </body>
</html>

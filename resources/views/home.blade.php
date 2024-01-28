<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" data-theme="sunset">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The Cloud Storage for developers">
        <title>Scroud</title>

        <!-- Fonts -->
      
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="bg-base-100">
        <x-navbar></x-navbar>
        <x-hero></x-hero>
        <x-enterprise></x-enterprise>
    </body>
</html>

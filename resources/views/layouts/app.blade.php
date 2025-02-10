<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : 'Selamat datang' }}</title>
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
    @stack('styles')
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @yield('content')

    @livewireScripts
    @stack('scripts')
</body>
</html>
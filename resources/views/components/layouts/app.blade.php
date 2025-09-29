<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'App' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="min-h-screen">
    {{ $slot }}
</div>

@livewireScripts
@vite('resources/js/app.js')
</body>
</html>

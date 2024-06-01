<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>@yield('title', 'Apartment Scheduling app')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>

<body>
    @include('partials.navbar')
    <div class="main">
        @if (session('status_message'))
            <div class="alert alert-info">{{ session('status_message') }}</div>
            <br />
        @endif
        @yield('content')
        @include('partials.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @livewireScripts
</body>

</html>

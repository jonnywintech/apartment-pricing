<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <title>@yield('title', 'Apartment Scheduling app')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @yield('vite_head')
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
    </div>
    @include('partials.footer')
    @livewireScripts
</body>

</html>

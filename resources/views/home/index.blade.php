@extends('template.app')

@section('content')

    <div class="container">
        <div class="home__wrapper">
            <h1 class="center-align">Welcome to the Hotel Room Pricing Portal</h1>

            @auth
            <h4 class="center-align">Please use <a href="/dashboard">dashboard</a> to start making scheduled pricing for apartments.</h4>
                @else
                <h4 class="center-align">Please <a href="/login">login</a> or <a href="/login">register</a> to continue.</h4>
            @endauth

        </div>
    </div>

@endsection

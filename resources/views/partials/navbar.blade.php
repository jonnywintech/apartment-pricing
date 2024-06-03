<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="/" class="brand-logo"><i class="material-icons" style="font-size: 50px">hotel</i>
            Hotel</a>
        <ul class="right hide-on-med-and-down">
            @auth
                <li><a href="/dashboard">Dashboard</a></li>
                <li class="text-black navbar__item">{{ auth()->user()->name }}</li>
                <li>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button class="waves-effect waves-light btn">logout</button>
                    </form>
                </li>
            @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endauth

        </ul>
        <ul id="nav-mobile" class="sidenav">
            @auth
                <li><a href="/dashboard">Dashboard</a></li>
                <li class="text-black navbar__item">{{ auth()->user()->name }}</li>
                <li>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button class="waves-effect waves-light btn">logout</button>
                    </form>
                </li>
            @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endauth
        </ul>
        <a href="/" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>

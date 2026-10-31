<header class="site-header">
    <div class="container nav-inner">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">A</span>
            <span>ALFITO<span class="brand-dot">.</span></span>
        </a>

        <nav class="main-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ url('/membership') }}">Membership</a>
            <a href="{{ url('/programs') }}">Programs</a>
            <a href="{{ url('/trainers') }}">Trainers</a>
            <a href="{{ url('/locations') }}">Locations</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="nav-login">Log in</a>

            <a href="{{ route('register') }}" class="btn btn-primary btn-small">
                Join Now <span aria-hidden="true">↗</span>
            </a>
        </div>

    </div>
</header>


<footer class="site-footer">
    <div class="container footer-main">

        <div class="footer-brand">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">A</span>
                <span>ALFITO<span class="brand-dot">.</span></span>
            </a>

            <p>
                Built for progress. Designed for your next level.
            </p>
        </div>

        <div class="footer-links">
            <a href="{{ url('/membership') }}">Membership</a>
            <a href="{{ url('/programs') }}">Programs</a>
            <a href="{{ url('/trainers') }}">Trainers</a>
            <a href="{{ url('/locations') }}">Locations</a>
        </div>

    </div>

    <div class="container footer-bottom">
        <span>© {{ date('Y') }} ALFITO Gym</span>
        <span>Train beyond limits.</span>
    </div>
</footer>

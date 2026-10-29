
@extends('layouts.public')

@section('title', 'ALFITO Gym — Train Beyond Limits')

@section('meta_description', 'Discover your next level with ALFITO Gym.')

@section('content')

<section class="hero-section">
    <div class="container hero-grid">

        <div class="hero-copy">
            <p class="eyebrow">
                <span class="eyebrow-line"></span>
                BUILT FOR YOUR NEXT LEVEL
            </p>

            <h1>
                TRAIN HARD.<br>
                LIVE <span class="text-accent">STRONG.</span>
            </h1>

            <p class="hero-description">
                More than a workout. Build your discipline,
                push your limits, and make progress every day
                with ALFITO Gym.
            </p>

            <div class="hero-actions">
                <a href="{{ url('/membership') }}" class="btn btn-primary">
                    Explore Membership <span aria-hidden="true">↗</span>
                </a>

                <a href="{{ url('/programs') }}" class="btn btn-outline">
                    Explore Programs
                </a>
            </div>

            <div class="hero-principles">
                <div>
                    <span class="principle-number">01</span>
                    <span class="principle-label">DISCIPLINE</span>
                </div>

                <div>
                    <span class="principle-number">02</span>
                    <span class="principle-label">STRENGTH</span>
                </div>

                <div>
                    <span class="principle-number">03</span>
                    <span class="principle-label">PROGRESS</span>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="visual-grid"></div>
            <div class="visual-glow"></div>

            <div class="visual-top">
                <span class="live-dot"></span>
                ALFITO / PERFORMANCE CLUB
            </div>

            <div class="visual-main">
                <span class="visual-kicker">YOUR NEXT LEVEL</span>

                <div class="visual-word">
                    NO<br>
                    LIMITS<span>.</span>
                </div>
            </div>

            <div class="visual-bottom">
                <span>BUILT THROUGH DISCIPLINE</span>
                <span>ALFITO®</span>
            </div>
        </div>

    </div>
</section>

<section class="principles-section">
    <div class="container">

        <div class="section-heading">
            <p class="eyebrow">THE ALFITO MINDSET</p>
            <h2>PROGRESS IS <span class="text-accent">EARNED.</span></h2>
            <p>
                Every session is an opportunity to become stronger
                than yesterday.
            </p>
        </div>

        <div class="principle-cards">
            <article class="principle-card">
                <span class="card-index">01 / MINDSET</span>
                <h3>STAY DISCIPLINED.</h3>
                <p>
                    Build a consistent routine and show up for your goals.
                </p>
            </article>

            <article class="principle-card">
                <span class="card-index">02 / TRAINING</span>
                <h3>MOVE WITH PURPOSE.</h3>
                <p>
                    Find a training approach that fits your needs and goals.
                </p>
            </article>

            <article class="principle-card">
                <span class="card-index">03 / PROGRESS</span>
                <h3>KEEP EVOLVING.</h3>
                <p>
                    Focus on steady improvement, one session at a time.
                </p>
            </article>
        </div>

    </div>
</section>

<section class="cta-section">
    <div class="container cta-inner">
        <div>
            <p class="eyebrow">YOUR JOURNEY STARTS HERE</p>
            <h2>READY FOR YOUR <span class="text-accent">NEXT LEVEL?</span></h2>
        </div>

        <a href="{{ route('register') }}" class="btn btn-primary">
            Join ALFITO <span aria-hidden="true">↗</span>
        </a>
    </div>
</section>

@endsection

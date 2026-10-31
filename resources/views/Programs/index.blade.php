
@extends('layouts.public')

@section('content')

<style>
    .programs-page {
        --lime: #c8ff36;
        --dark: #090a08;
        background: var(--dark);
        color: #fff;
        overflow: hidden;
    }

    .programs-page * {
        box-sizing: border-box;
    }

    .programs-container {
        width: min(1180px, 90%);
        margin: auto;
    }

    /* HERO - NO IMAGE */
    .programs-hero {
        min-height: 590px;
        display: flex;
        align-items: center;
        position: relative;
        background:
            radial-gradient(ellipse at 80% 50%, #202a13 0%, transparent 48%),
            linear-gradient(135deg, #10120d, #090a08 70%);
        border-bottom: 1px solid #ffffff10;
    }

    .programs-hero-content {
        max-width: 700px;
        padding: 100px 0;
        position: relative;
        z-index: 2;
    }

    .programs-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--lime);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .programs-eyebrow::before {
        content: "";
        width: 30px;
        height: 2px;
        background: var(--lime);
    }

    .programs-hero h1 {
        font-size: clamp(46px, 7vw, 86px);
        font-weight: 950;
        line-height: .99;
        letter-spacing: -4px;
        margin: 25px 0;
        text-transform: uppercase;
    }

    .programs-hero h1 span {
        color: var(--lime);
    }

    .programs-hero p {
        color: #c1c4ba;
        font-size: 16px;
        line-height: 1.9;
        max-width: 510px;
        margin-bottom: 32px;
    }

    .programs-primary-btn {
        display: inline-flex;
        align-items: center;
        gap: 22px;
        background: var(--lime);
        color: #10120c;
        text-decoration: none;
        font-size: 13px;
        font-weight: 900;
        padding: 17px 23px;
        border-radius: 4px;
        transition: .3s;
    }

    .programs-primary-btn:hover {
        background: white;
        color: #10120c;
        transform: translateY(-3px);
    }

    .hero-bottom-label {
        position: absolute;
        bottom: 35px;
        right: 5%;
        color: #ffffff80;
        font-size: 11px;
        letter-spacing: 3px;
    }

    /* INTRO */
    .programs-intro {
        padding: 100px 0 45px;
    }

    .programs-intro-top {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 30px;
        flex-wrap: wrap;
    }

    .programs-intro h2 {
        font-size: clamp(32px, 5vw, 49px);
        font-weight: 900;
        letter-spacing: -1.5px;
        margin: 14px 0 0;
    }

    .programs-intro h2 span {
        color: var(--lime);
    }

    .programs-intro p {
        color: #999f91;
        max-width: 390px;
        line-height: 1.8;
        margin: 0;
    }

    /* PROGRAM GRID */
    .programs-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
        padding: 35px 0 100px;
    }

    .program-card {
        min-height: 410px;
        position: relative;
        overflow: hidden;
        border-radius: 9px;
        background: #20221d;
        isolation: isolate;
        border: 1px solid #ffffff12;
    }

    .program-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: var(--program-image);
        background-size: cover;
        background-position: center;
        transition: transform .65s ease;
        z-index: -2;
    }

    .program-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            180deg,
            rgba(0,0,0,.04) 0%,
            rgba(0,0,0,.20) 35%,
            rgba(0,0,0,.94) 100%
        );
        z-index: -1;
    }

    .program-card:hover::before {
        transform: scale(1.09);
    }

    .program-card-content {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 27px;
    }

    .program-number {
        position: absolute;
        top: 22px;
        left: 23px;
        font-size: 12px;
        color: var(--lime);
        font-weight: 800;
        letter-spacing: 2px;
    }

    .program-tag {
        display: inline-block;
        color: var(--lime);
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;
        margin-bottom: 12px;
    }

    .program-card h3 {
        font-size: 26px;
        font-weight: 900;
        margin: 0 0 10px;
    }

    .program-card p {
        color: #d0d0ca;
        font-size: 13px;
        line-height: 1.7;
        margin: 0 0 20px;
    }

    .program-card a {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: var(--lime);
        text-decoration: none;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 1px;
        transition: .3s;
    }

    .program-card a:hover {
        gap: 20px;
        color: white;
    }

    /* CTA */
    .programs-cta {
        margin-bottom: 100px;
        padding: 65px;
        border-radius: 10px;
        background:
            linear-gradient(90deg, rgba(9,10,7,.96), rgba(9,10,7,.55)),
            url('https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=1600&q=85')
            center/cover;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .programs-cta h2 {
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 950;
        margin: 12px 0;
    }

    .programs-cta p {
        color: #b6b9ae;
        margin: 0;
        line-height: 1.7;
    }

    @media(max-width: 900px) {
        .programs-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .programs-hero {
            min-height: 520px;
        }
    }

    @media(max-width: 600px) {
        .programs-grid {
            grid-template-columns: 1fr;
        }

        .programs-hero h1 {
            letter-spacing: -2px;
        }

        .program-card {
            min-height: 390px;
        }

        .programs-cta {
            padding: 35px 25px;
        }

        .programs-intro {
            padding-top: 65px;
        }
    }
</style>

<div class="programs-page">

    <!-- HERO -->
    <section class="programs-hero">
        <div class="programs-container">
            <div class="programs-hero-content">

                <div class="programs-eyebrow">
                    Train With Purpose
                </div>

                <h1>
                    PUSH YOUR<br>
                    <span>LIMITS.</span><br>
                    OWN YOUR<br>
                    STRENGTH.
                </h1>

                <p>
                    Your fitness journey starts here. Explore our training
                    programs, challenge yourself, and build a stronger
                    version of you.
                </p>

                <a href="#explore-programs" class="programs-primary-btn">
                    EXPLORE PROGRAMS <span>↗</span>
                </a>

            </div>
        </div>

        <div class="hero-bottom-label">
            ALFITO GYM — BUILT FOR PROGRESS
        </div>
    </section>

    <!-- INTRO -->
    <section class="programs-intro" id="explore-programs">
        <div class="programs-container">

            <div class="programs-intro-top">

                <div>
                    <div class="programs-eyebrow">WHAT WE OFFER</div>
                    <h2>FIND YOUR <span>TRAINING.</span></h2>
                </div>

                <p>
                    Whatever your fitness goals are, we have a training
                    direction to help you move forward and make progress.
                </p>

            </div>

        </div>
    </section>

    <!-- PROGRAM CARDS -->
    <section class="programs-container">
        <div class="programs-grid">

            <article class="program-card"
                style="--program-image: url('https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?auto=format&fit=crop&w=900&q=85')">
                <span class="program-number">01 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">STRENGTH TRAINING</span>
                    <h3>Muscle Building</h3>
                    <p>Build muscle mass and develop strength through structured resistance training.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

            <article class="program-card"
                style="--program-image: url('https://images.unsplash.com/photo-1538805060514-97d9cc17730c?auto=format&fit=crop&w=900&q=85')">
                <span class="program-number">02 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">WEIGHT MANAGEMENT</span>
                    <h3>Fat Burning</h3>
                    <p>Improve your fitness with cardio and full-body workout sessions.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

           <article class="program-card"
    style="--program-image: url('/images/programs/personal-training.png')">
                <span class="program-number">03 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">PERSONAL COACHING</span>
                    <h3>Personal Training</h3>
                    <p>Get personalized workout guidance tailored to your individual fitness goals.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

            <article class="program-card"
                style="--program-image: url('https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=900&q=85')">
                <span class="program-number">04 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">BODY & MIND</span>
                    <h3>Flexibility & Mobility</h3>
                    <p>Improve flexibility, balance, and mobility through controlled movements.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

            <article class="program-card"
                style="--program-image: url('https://images.unsplash.com/photo-1538805060514-97d9cc17730c?auto=format&fit=crop&w=900&q=85')">
                <span class="program-number">05 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">ENDURANCE</span>
                    <h3>Cardio Fitness</h3>
                    <p>Develop cardiovascular endurance and increase your overall stamina.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

            <article class="program-card"
                style="--program-image: url('https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=900&q=85')">
                <span class="program-number">06 / 06</span>
                <div class="program-card-content">
                    <span class="program-tag">ATHLETIC PERFORMANCE</span>
                    <h3>Functional Training</h3>
                    <p>Build coordination, stability, and practical strength for everyday activities.</p>
                    <a href="{{ route('membership') }}">GET STARTED ↗</a>
                </div>
            </article>

        </div>
    </section>

    <!-- CTA -->
    <section class="programs-container">
        <div class="programs-cta">

            <div>
                <div class="programs-eyebrow">YOUR JOURNEY STARTS NOW</div>
                <h2>READY TO LEVEL UP?</h2>
                <p>Take the first step toward a stronger and healthier you.</p>
            </div>

            <a href="{{ route('membership') }}" class="programs-primary-btn">
                JOIN ALFITO GYM <span>↗</span>
            </a>

        </div>
    </section>

</div>

@endsection


@extends('layouts.public')

@section('content')

<style>
    .trainers-page {
        background: #090b0a;
        color: #f5f5f5;
        font-family: inherit;
        overflow: hidden;
    }

    .trainers-page * {
        box-sizing: border-box;
    }

    .trainers-container {
        width: min(1200px, 90%);
        margin: auto;
    }

    /* HERO */
    .trainers-hero {
        min-height: 440px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(90deg, rgba(9,11,10,.98), rgba(9,11,10,.75)),
            url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1800&q=85')
            center/cover;
        padding: 100px 0;
    }

    .trainers-hero-content {
        max-width: 750px;
    }

    .trainers-eyebrow {
        color: #b7f34a;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 22px;
    }

    .trainers-hero h1 {
        font-size: clamp(44px, 7vw, 78px);
        line-height: 1.02;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .trainers-hero h1 span {
        color: #b7f34a;
    }

    .trainers-hero p {
        max-width: 570px;
        color: #b5b9b5;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .trainers-btn {
        display: inline-block;
        background: #b7f34a;
        color: #11150c;
        padding: 15px 28px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: .3s;
    }

    .trainers-btn:hover {
        background: #d1ff79;
        color: #11150c;
        transform: translateY(-3px);
    }

    /* INTRO */
    .trainers-intro {
        padding: 100px 0 55px;
        text-align: center;
    }

    .trainers-intro h2 {
        font-size: clamp(32px, 5vw, 48px);
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 18px;
    }

    .trainers-intro h2 span {
        color: #b7f34a;
    }

    .trainers-intro p {
        color: #929992;
        max-width: 650px;
        margin: auto;
        line-height: 1.8;
        font-size: 15px;
    }

    /* TRAINER GRID */
    .trainers-grid-section {
        padding: 25px 0 100px;
    }

    .trainers-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .trainer-card {
        background: #141815;
        border: 1px solid #252d26;
        overflow: hidden;
        transition: .35s ease;
    }

    .trainer-card:hover {
        transform: translateY(-8px);
        border-color: #b7f34a;
    }

    .trainer-image {
        height: 350px;
        position: relative;
        overflow: hidden;
        background: #202720;
    }

    .trainer-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        transition: transform .5s ease;
    }

    .trainer-card:hover .trainer-image img {
        transform: scale(1.07);
    }

    .trainer-number {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #b7f34a;
        color: #10150b;
        font-size: 11px;
        font-weight: 900;
        padding: 8px 12px;
        letter-spacing: 1px;
    }

    .trainer-info {
        padding: 24px 20px 26px;
    }

    .trainer-role {
        color: #b7f34a;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .trainer-info h3 {
        font-size: 21px;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .trainer-info p {
        color: #929992;
        font-size: 13px;
        line-height: 1.7;
        min-height: 65px;
        margin-bottom: 18px;
    }

    .trainer-experience {
        border-top: 1px solid #303830;
        padding-top: 15px;
        color: #d0d5d0;
        font-size: 12px;
    }

    .trainer-experience span {
        color: #b7f34a;
        font-weight: 800;
    }

    /* EXPERTISE */
    .expertise-section {
        padding: 85px 0;
        background: #111612;
    }

    .expertise-heading {
        text-align: center;
        margin-bottom: 45px;
    }

    .expertise-heading h2 {
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 900;
        text-transform: uppercase;
    }

    .expertise-heading h2 span {
        color: #b7f34a;
    }

    .expertise-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
    }

    .expertise-item {
        padding: 30px 20px;
        background: #191f1a;
        border: 1px solid #2b342c;
        text-align: center;
        transition: .3s;
    }

    .expertise-item:hover {
        border-color: #b7f34a;
        background: #202820;
    }

    .expertise-icon {
        font-size: 30px;
        margin-bottom: 17px;
    }

    .expertise-item h3 {
        font-size: 14px;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .expertise-item p {
        color: #929992;
        font-size: 12px;
        line-height: 1.6;
        margin: 0;
    }

    /* CTA */
    .trainers-cta {
        padding: 100px 20px;
        text-align: center;
        background:
            linear-gradient(rgba(9,11,10,.88), rgba(9,11,10,.93)),
            url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1600&q=85')
            center/cover;
    }

    .trainers-cta h2 {
        font-size: clamp(34px, 5vw, 55px);
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 18px;
    }

    .trainers-cta h2 span {
        color: #b7f34a;
    }

    .trainers-cta p {
        color: #aeb4ae;
        margin-bottom: 30px;
    }

    /* RESPONSIVE */
    @media (max-width: 1000px) {
        .trainers-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .expertise-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .trainers-hero {
            min-height: 400px;
            padding: 75px 0;
        }

        .trainers-grid {
            grid-template-columns: 1fr;
        }

        .trainer-image {
            height: 390px;
        }

        .expertise-grid {
            grid-template-columns: 1fr 1fr;
        }

        .trainers-intro {
            padding-top: 70px;
        }

        .trainers-cta {
            padding: 75px 20px;
        }
    }
</style>

<div class="trainers-page">

    <!-- HERO SECTION -->
    <section class="trainers-hero">
        <div class="trainers-container">
            <div class="trainers-hero-content">

                <div class="trainers-eyebrow">
                    ALFITO GYM / OUR TEAM
                </div>

                <h1>
                    TRAIN WITH<br>
                    THE <span>BEST.</span>
                </h1>

                <p>
                    Meet the people behind your progress.
                    Our dedicated fitness trainers are here to
                    guide, motivate, and help you achieve your
                    fitness goals.
                </p>

                <a href="#our-trainers" class="trainers-btn">
                    Meet Our Trainers
                </a>

            </div>
        </div>
    </section>


    <!-- INTRO SECTION -->
    <section class="trainers-intro">
        <div class="trainers-container">

            <div class="trainers-eyebrow">
                YOUR JOURNEY. OUR GUIDANCE.
            </div>

            <h2>
                MEET YOUR <span>TRAINERS.</span>
            </h2>

            <p>
                Great results start with the right guidance.
                Get to know our fitness team, discover their
                expertise, and find the right trainer to support
                your fitness journey.
            </p>

        </div>
    </section>


    <!-- TRAINER CARDS -->
    <section class="trainers-grid-section" id="our-trainers">
        <div class="trainers-container">

            <div class="trainers-grid">

                <!-- TRAINER 01 -->
                <article class="trainer-card">

                    <div class="trainer-image">
                        <img
                                src="{{ asset('images/trainer/tnf.jpg') }}"
                            alt="tnf - Strength Coach"
                            loading="lazy"
                        >

                        <span class="trainer-number">01</span>
                    </div>

                    <div class="trainer-info">

                        <div class="trainer-role">
                            Head Trainer
                        </div>

                        <h3>Tnf</h3>

                        <p>
                            Science and Sustainability
                        </p>

                        <div class="trainer-experience">
                            Experience: <span>8 Years</span>
                        </div>

                    </div>
                </article>


                <!-- TRAINER 02 -->
                <article class="trainer-card">

                    <div class="trainer-image">
                     <img
                         src="{{ asset('images/trainer/jacob.jpeg') }}"
                         alt="Jacob Oestreicher - Fitness Coach"
                         loading="lazy"
    >

                        <span class="trainer-number">02</span>
                   </div>
                    <div class="trainer-info">

                        <div class="trainer-role">
                            Personal Trainer
                        </div>

                        <h3>Jacob Oestreicher</h3>

                        <p>
                            LOSE FAT GAIN MUSCLE
                        </p>

                        <div class="trainer-experience">
                            Experience: <span>6 Years</span>
                        </div>

                    </div>
                </article>


                <!-- TRAINER 03 -->
                <article class="trainer-card">

                    <div class="trainer-image">
                        <img
                            src="{{ asset('images/trainer/Gerryano.png') }}"                            alt="Daniel Carter - Bodybuilding Coach"
                            loading="lazy"
                        >

                        <span class="trainer-number">03</span>
                    </div>

                    <div class="trainer-info">

                        <div class="trainer-role">
                            Bodybuilding Coach
                        </div>

                        <h3>Gerryano</h3>

                        <p>
                            Helps members develop muscle mass,
                            improve physique, and build strength.
                        </p>

                        <div class="trainer-experience">
                            Experience: <span>7 Years</span>
                        </div>

                    </div>
                </article>


                <!-- TRAINER 04 -->
                <article class="trainer-card">

                    <div class="trainer-image">
                        <img
                            src="{{ asset('images/trainer/Delonix.png') }}"                            alt="Daniel Carter - Bodybuilding Coach"
                            alt="Michael Brooks - Functional Fitness Coach"
                            loading="lazy"
                        >

                        <span class="trainer-number">04</span>
                    </div>

                    <div class="trainer-info">

                        <div class="trainer-role">
                            Functional Coach
                        </div>

                        <h3>Delonix Sanjaya</h3>

                        <p>
                            Specializes in mobility, conditioning,
                            and functional movement training.
                        </p>

                        <div class="trainer-experience">
                            Experience: <span>10 Years</span>
                        </div>

                    </div>
                </article>

            </div>
        </div>
    </section>


    <!-- TRAINING EXPERTISE -->
    <section class="expertise-section">

        <div class="trainers-container">

            <div class="expertise-heading">

                <div class="trainers-eyebrow">
                    TRAINING SPECIALTIES
                </div>

                <h2>
                    FIND YOUR <span>FOCUS.</span>
                </h2>

            </div>

            <div class="expertise-grid">

                <div class="expertise-item">
                    
                    <h3>Strength Training</h3>
                    <p>
                        Build strength and improve
                        overall performance.
                    </p>
                </div>

                <div class="expertise-item">
                    <h3>Muscle Building</h3>
                    <p>
                        Develop muscle mass and
                        achieve your physique goals.
                    </p>
                </div>

                <div class="expertise-item">
                    <h3>Weight Management</h3>
                    <p>
                        Work toward sustainable
                        fitness and body composition goals.
                    </p>
                </div>

                <div class="expertise-item">
                    <h3>Functional Fitness</h3>
                    <p>
                        Improve mobility, balance,
                        and everyday movement.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- CTA SECTION -->
    <section class="trainers-cta">

        <div class="trainers-container">

            <div class="trainers-eyebrow">
                YOUR NEXT LEVEL STARTS HERE
            </div>

            <h2>
                READY TO FIND<br>
                YOUR <span>TRAINER?</span>
            </h2>

            <p>
                Take the first step toward your fitness goals
                with the right guidance.
            </p>

            <a href="{{ route('membership') }}" class="trainers-btn">
                GET STARTED
            </a>

        </div>

    </section>

</div>

@endsection

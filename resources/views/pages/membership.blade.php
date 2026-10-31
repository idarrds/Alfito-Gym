
@extends('layouts.public')

@section('title', 'Membership | ALFITO Gym')

@section('content')

<style>
    .membership-page {
        background: #090b09;
        color: #f5f5f0;
        min-height: 100vh;
        padding-bottom: 80px;
    }

    .membership-hero {
        text-align: center;
        padding: 90px 20px 65px;
        background: radial-gradient(
            circle at top,
            rgba(190, 242, 100, 0.12),
            transparent 65%
        );
    }

    .membership-label {
        color: #c7f36b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 3px;
        margin-bottom: 20px;
    }

    .membership-hero h1 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(48px, 7vw, 82px);
        line-height: 1;
        margin-bottom: 20px;
    }

    .membership-hero h1 span {
        color: #c7f36b;
    }

    .membership-hero p {
        color: #999e94;
        max-width: 600px;
        margin: auto;
        font-size: 14px;
        line-height: 1.8;
    }

    .membership-container {
        max-width: 1150px;
        margin: auto;
        padding: 0 24px;
    }

    .membership-heading {
        margin-bottom: 35px;
    }

    .membership-heading h2 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 42px;
        margin-bottom: 8px;
    }

    .membership-heading p {
        color: #999e94;
        font-size: 13px;
    }

    .membership-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
        align-items: stretch;
    }

    .membership-card {
        background: #151815;
        border: 1px solid #292e28;
        padding: 30px 25px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        transition: .25s ease;
    }

    .membership-card:hover {
        border-color: #c7f36b;
        transform: translateY(-5px);
    }

    .membership-card.featured {
        border: 1px solid #c7f36b;
        background: linear-gradient(
            180deg,
            rgba(199, 243, 107, .09),
            #151815 45%
        );
    }

    .plan-badge {
        display: inline-block;
        width: fit-content;
        padding: 7px 12px;
        background: rgba(199, 243, 107, .1);
        color: #c7f36b;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1px;
        border-radius: 3px;
        margin-bottom: 25px;
    }

    .membership-card h3 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 31px;
        margin-bottom: 5px;
    }

    .plan-duration {
        color: #999e94;
        font-size: 12px;
        margin-bottom: 25px;
    }

    .plan-price {
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 5px;
        color: #fff;
    }

    .plan-price-label {
        color: #858b80;
        font-size: 11px;
        margin-bottom: 25px;
    }

    .plan-divider {
        height: 1px;
        background: #30362e;
        margin-bottom: 25px;
    }

    .plan-benefits {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
        flex: 1;
    }

    .plan-benefits li {
        color: #b4b9af;
        font-size: 12px;
        margin-bottom: 14px;
    }

    .plan-benefits li::before {
        content: '✓';
        color: #c7f36b;
        font-weight: bold;
        margin-right: 10px;
    }

    .plan-button {
        display: block;
        width: 100%;
        padding: 14px;
        text-align: center;
        text-decoration: none;
        background: transparent;
        color: #c7f36b;
        border: 1px solid #c7f36b;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        border-radius: 3px;
        transition: .2s;
    }

    .plan-button:hover {
        background: #c7f36b;
        color: #090b09;
    }

    .featured .plan-button {
        background: #c7f36b;
        color: #090b09;
    }

    .featured .plan-button:hover {
        background: #d8ff87;
    }

    .membership-empty {
        padding: 40px;
        text-align: center;
        background: #151815;
        border: 1px solid #292e28;
        color: #999e94;
    }

    .membership-note {
        color: #777e72;
        text-align: center;
        font-size: 11px;
        margin-top: 25px;
    }

    @media (max-width: 850px) {
        .membership-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .membership-grid {
            grid-template-columns: 1fr;
        }

        .membership-hero {
            padding-top: 60px;
        }
    }
</style>

<div class="membership-page">

    <section class="membership-hero">
        <div class="membership-label">
            ALFITO GYM MEMBERSHIP
        </div>

        <h1>
            CHOOSE YOUR <span>LEVEL.</span>
        </h1>

        <p>
            Your fitness journey deserves the right commitment.
            Choose your membership plan and start building a stronger version of yourself.
        </p>
    </section>

    <section class="membership-container">

        <div class="membership-heading">
            <div class="membership-label">
                MEMBERSHIP PLANS
            </div>

            <h2>FIND YOUR PERFECT PLAN.</h2>

            <p>
                Choose the membership that matches your fitness goals.
            </p>
        </div>

        @if($plans->isNotEmpty())

            <div class="membership-grid">

                @foreach($plans as $index => $plan)

                    <div class="membership-card {{ $index === 1 ? 'featured' : '' }}">

                        <div class="plan-badge">
                            {{ $index === 1 ? 'MOST POPULAR' : 'MEMBERSHIP PLAN' }}
                        </div>

                        <h3>{{ $plan->name }}</h3>

                        <div class="plan-duration">
                            {{ $plan->duration_months }}
                            {{ $plan->duration_months == 1 ? 'MONTH' : 'MONTHS' }}
                        </div>

                        <div class="plan-price">
                            Rp{{ number_format((float) $plan->price, 0, ',', '.') }}
                        </div>

                        <div class="plan-price-label">
                            Total membership price
                        </div>

                        <div class="plan-divider"></div>

                        <ul class="plan-benefits">
                            <li>Access to gym facilities</li>
                            <li>Membership account</li>
                            <li>Membership status tracking</li>
                            <li>Payment verification</li>
                            <li>Dedicated member dashboard</li>
                        </ul>

                        <a href="{{ route('register') }}" class="plan-button">
                            CHOOSE THIS PLAN →
                        </a>

                    </div>

                @endforeach

            </div>

            <div class="membership-note">
                Membership activation is subject to application approval and payment verification.
            </div>

        @else

            <div class="membership-empty">
                <h3>No Membership Plans Available</h3>
                <p>Please check again later.</p>
            </div>

        @endif

    </section>

</div>

@endsection
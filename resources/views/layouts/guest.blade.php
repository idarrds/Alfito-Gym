
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ALFITO Gym — Member Access</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/alfito-public.css') }}"
    >
</head>

<body class="auth-body">

    <div class="auth-shell">

        <section class="auth-brand-panel">
            <a href="{{ url('/') }}" class="auth-logo">
                <span class="auth-logo-mark">A</span>
                <span>ALFITO<span class="auth-logo-dot">.</span></span>
            </a>

            <div class="auth-brand-content">
                <p class="auth-kicker">
                    <span class="auth-dot"></span>
                    PERFORMANCE / DISCIPLINE / PROGRESS
                </p>

                <h2>
                    TRAIN<br>
                    BEYOND<br>
                    <span>LIMITS.</span>
                </h2>

                <p class="auth-brand-description">
                    Build your strength. Challenge your limits.
                    Become a stronger version of yourself with ALFITO.
                </p>
            </div>

            <div class="auth-brand-bottom">
                <span>ALFITO® PERFORMANCE CLUB</span>
                <span>EST. FOR PROGRESS</span>
            </div>
        </section>

        <section class="auth-form-panel">
            <div class="auth-card">

                <a href="{{ url('/') }}" class="auth-logo auth-mobile-logo">
                    <span class="auth-logo-mark">A</span>
                    <span>ALFITO<span class="auth-logo-dot">.</span></span>
                </a>

                {{ $slot }}

            </div>
        </section>

    </div>

</body>
</html>

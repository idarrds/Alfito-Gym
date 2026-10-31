<x-guest-layout>

    <p class="auth-kicker">
        <span class="auth-dot"></span>
        MEMBER ACCESS
    </p>

    <h1 class="auth-heading">
        WELCOME <span>BACK.</span>
    </h1>

    <p class="auth-subtitle">
        Sign in to your account and continue your fitness journey.
    </p>

    @if (session('status'))
        <div class="auth-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form">
    @csrf

        <div class="auth-field">
            <label for="email" class="auth-label">Email Address</label>

            <input
                id="email"
                class="auth-input"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="you@example.com"
                required
                autofocus
                autocomplete="username"
            >

            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-field">
            <label for="password" class="auth-label">Password</label>

            <input
                id="password"
                class="auth-input"
                type="password"
                name="password"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
            >

            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-options">
            <label for="remember_me" class="auth-checkbox">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="auth-submit">
            SIGN IN <span aria-hidden="true">↗</span>
        </button>
    </form>

    <p class="auth-footer">
        Don't have an account?
        <a href="{{ route('register') }}" class="auth-link">Create account</a>
    </p>

</x-guest-layout>

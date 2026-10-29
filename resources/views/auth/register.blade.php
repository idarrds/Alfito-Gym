
<x-guest-layout>

    <p class="auth-kicker">
        <span class="auth-dot"></span>
        JOIN THE MOVEMENT
    </p>

    <h1 class="auth-heading">
        CREATE YOUR <span>ACCOUNT.</span>
    </h1>

    <p class="auth-subtitle">
        Start your journey. Build your strength. Become ALFITO.
    </p>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <label for="name" class="auth-label">Full Name</label>

            <input
                id="name"
                class="auth-input"
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

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
                placeholder="Create a password"
                required
                autocomplete="new-password"
            >

            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-field">
            <label for="password_confirmation" class="auth-label">
                Confirm Password
            </label>

            <input
                id="password_confirmation"
                class="auth-input"
                type="password"
                name="password_confirmation"
                placeholder="Enter your password again"
                required
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="auth-submit">
            CREATE ACCOUNT <span aria-hidden="true">↗</span>
        </button>
    </form>

    <p class="auth-footer">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-link">Sign in</a>
    </p>

</x-guest-layout>

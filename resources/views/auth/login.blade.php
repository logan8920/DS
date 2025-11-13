<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="left-panel">
        <div class="left-panel-content">
            <h1><i class="bi bi-shop-window me-2"></i>Grow Your Dropshipping Empire</h1>
            <p>Manage products, track orders, and scale your business seamlessly.</p>
        </div>
    </div>

    <div class="login-container">
        <h2><i class="bi bi-box-arrow-in-right me-2"></i>Welcome Back</h2>
        <p class="text-muted mb-4">Sign in to your intelligent dropshipping workspace</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa fa-envelope me-2"></i>Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
                    value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fa fa-lock me-2"></i>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••"
                    required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login w-100 mt-3">
                {{ __('Login') }} <i class="fa fa-arrow-right ms-2"></i>
            </button>

            <!-- Links -->
            <div class="d-flex justify-content-between mt-3">
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <a href="{{ route('register') }}" class="small text-decoration-none text-muted">
                    {{ __('Create account') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>

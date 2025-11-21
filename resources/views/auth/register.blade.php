<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="left-panel register">
        <div class="left-panel-content">
            <img src="{{ asset('assets/images/svg/register.svg') }}" alt="">
            <h1><i class="bi bi-shop me-2"></i>Start Your E-Commerce Journey</h1>
            <p>Create your account and take your dropshipping business to the next level.</p>
        </div>
    </div>

    <div class="register-container">
        <h2><i class="bi bi-person-plus me-2"></i>Create Account</h2>
        <p class="text-muted mb-4">Join the smart dropshipping platform today</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fa fa-user me-2"></i>Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="John Doe" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa fa-envelope me-2"></i>Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="you@example.com" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fa fa-lock me-2"></i>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><i class="fa fa-check-circle me-2"></i>Confirm
                    Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="••••••••" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn btn-register w-100 mt-3">
                {{ __('Register') }} <i class="fa fa-arrow-right ms-2"></i>
            </button>

            <div class="text-center mt-3">
                <p class="small text-muted mb-0">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">Login</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>

<x-guest-layout>
    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup"><a href="{{ route('register') }}">Signup</a></label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form method="POST" action="{{ route('login') }}" class="login">
                    @csrf

                    <div class="field">
                        <input type="email" placeholder="Email Address" name="email" :value="old('email')" required
                            autofocus autocomplete="username" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required
                            autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end pass-link ">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"> </div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">Not a member? <a href="{{ route('register') }}">Signup now</a></div>
                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
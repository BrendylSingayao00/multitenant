<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login &amp; signup form</title>
        <link rel="stylesheet" href="./style.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <div class="wrapper">
            <div class="title-text">
                <div class="title signup">Signup Form</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login">
                    <input type="radio" name="slide" id="signup" checked>
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <input type="text" placeholder="Name" id="name" name="name" :value="old('name')" required
                                autofocus autocomplete="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="field">
                            <input placeholder="Email Address" id="email" type="email" name="email"
                                :value="old('email')" required autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="field">
                            <input type="password" id="password" placeholder="Password" name="password" required
                                autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="field">
                            <input type="password" id="password_confirmation" placeholder="Confirm password"
                                name="password_confirmation" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Signup">
                        </div>
                        <div class="signup-link">Already a member? <a href="{{ route('login') }}"> Login</a></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- partial -->
        <script src="./script.js"></script>

    </body>

    </html>
</x-guest-layout>
@include('layouts.frontend.head')
<style>
    .btn-submit {
        background-color: unset;
        border: 0;
    }

    #loginForm input {
        text-align: center;
        font-size: 18px !important;
        font-weight: 600 !important;
    }
</style>
<div class="banner">
    <section class="home-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="home-div">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" class="home-logo" alt="">
                    </div>


                </div>
            </div>
            <div class="row" id="createForm">
                <div class="col-lg-6 offset-lg-3">
                    @if (session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form method="POST" id="loginForm" action="{{ route('login') }}">
                        @csrf

                        {{-- <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="">{{ __('Email Address') }}</label>
                            <input id="email" type="email" name="email"
                                class="form-control  @error('email') is-invalid @enderror header-search"
                                autocomplete="off" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror header-search"
                                autocomplete="off" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                        <div class="mt-5">
                            <button class="btn-submit" type="submit">
                                <img src="{{ URL::asset('frontend/icons/3.png') }}" height="50" alt="">
                            </button>
                            <div class="text-white">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white mt-3" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

</body>

</html>

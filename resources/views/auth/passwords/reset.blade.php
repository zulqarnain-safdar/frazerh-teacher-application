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

    .invalid-feedback {
        display: block !important;
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        {{-- <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                    required autocomplete="new-password">

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
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" name="password_confirmation"
                                class="form-control header-search" required autocomplete="new-password">
                        </div>

                        <div class="mt-3">
                            <button type="submit"
                                class="btn password-button"><b>{{ __('Reset Password') }}</b></button>
                        </div>

                        {{-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div> --}}
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

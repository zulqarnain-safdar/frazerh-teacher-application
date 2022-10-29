@include('layouts.frontend.head')
<style>
    .btn-submit {
        background-color: unset;
        border: 0;
    }

    #emailForm input {
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" id="emailForm" action="{{ route('password.email') }}">
                        @csrf

                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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

                        <div class="mt-3">
                            <button type="submit"
                                class="btn password-button"><b>{{ __('Send Password Reset Link') }}</b></button>
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

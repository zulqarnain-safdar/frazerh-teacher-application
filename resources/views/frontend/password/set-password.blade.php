@include('layouts.frontend.head')
<style>
    .btn-submit {
        background-color: unset;
        border: 0;
    }

    #passwordForm input {
        text-align: center;
        font-size: 18px !important;
        font-weight: 600 !important;
    }
</style>
<div class="banner">
    <section class="password-section">
        <div>
            <a href="javascript::void(0)" class="btn password-button-text"><b>SET PASSWORD</b></a>
        </div>
        <div class="container-fluid text-center" style="position: relative;
    bottom: 22px;">
            <div class="row">
                <div class="col-12">
                    <div class="home-div">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" class="home-logo" alt="">
                    </div>

                </div>
            </div>
            <div class="row" id="createForm">
                <div class="col-lg-6 offset-lg-3">
                    <form id="passwordForm" action="{{ route('teacher.save_password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" value="{{ old('password') }}" name="password"
                                placeholder="CHOOSE PASSWORD"
                                class="form-control @error('password') is-invalid @enderror header-search"
                                autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" value="{{ old('confirm_password') }}" name="confirm_password"
                                placeholder="ENTER PASSWORD AGAIN"
                                class="form-control @error('confirm_password') is-invalid @enderror header-search mt-4"
                                autocomplete="off">
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn password-button"><b>SET PASSWORD</b></button>
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
<script>
    $('#teacherProfileSearch').keypress(function (e) {
        var key = e.which;
        var value = e.value
        if(key == 13) // the enter key code
        {
            let href = '/search-teacher-by-username'
            $('#teacherProfileSearchForm').attr('action', href);
        }
    });
</script>

</body>

</html>

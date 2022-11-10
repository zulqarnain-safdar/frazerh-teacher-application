@include('layouts.frontend.head')
<style>
    #resetForm input {
        text-align: center;
        font-size: 18px !important;
        font-weight: 600 !important;
    }

    .invalid-feedback {
        display: block !important;
    }
</style>
<div class="banner">
    <section class="password-section">
        <div>
            <a href="javascript::void(0)" class="btn password-button-text"><b>RESET PASSWORD</b></a>
        </div>
        <div class="container-fluid text-center" style="position: relative;
    bottom: 22px;">
            <div class="row">
                <div class="col-12">
                    <div class="home-div" style="margin-top:60px;">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" style="width:150px" alt="">
                    </div>

                </div>
            </div>
            <div class="row" style="position: relative;bottom:125px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <a href="/{{ auth()->user()->profile()->first()->profile_name }}"
                            class="btn button-text-3cf7f7"><b>/{{ auth()->user()->profile()->first()->profile_name }}</b></a>
                    </div>
                </div>
            </div>
            <div class="row" style="position: relative;bottom:90px">
                <div class="col-lg-6 offset-lg-3">
                    @if ($message = Session::get('errormessage'))
                        <div class="alert alert-danger">
                            {{ session()->get('errormessage') }}
                        </div>
                    @endif
                    @if ($message = Session::get('successmessage'))
                        <div class="alert alert-success">
                            {{ session()->get('successmessage') }}
                        </div>
                    @endif

                    <form id="resetForm" action="{{ route('teacher.reset_password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" name="oldpassword" placeholder="OLD PASSWORD"
                                class="form-control header-search">
                            @error('oldpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="newpassword" placeholder="NEW PASSWORD"
                                class="form-control header-search mt-4">
                            @error('newpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirmpassword" placeholder="NEW PASSWORD AGAIN"
                                class="form-control header-search mt-4">
                            @error('confirmpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn password-button"><b>RESET PASSWORD</b></button>
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

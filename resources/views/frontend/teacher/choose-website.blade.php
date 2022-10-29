@include('layouts.frontend.head')
<style>
    .btn-submit {
        background-color: unset;
        border: 0;
    }

    .invalid-feedback {
        display: block;
    }

    #createForm input {
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
                    <form action="{{ route('save_profile_link') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="" style="font-weight: 600 !important;">CHOOSE WEBSITE</label>
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: 400 !important;">www.Teacher4.me/</label>
                            <input type="text" value="{{ old('profile_name') }}" name="profile_name"
                                class="header-search" style="height: 48px !important;" autocomplete="off">
                            @error('profile_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button class="btn-submit" type="submit">
                                <img src="{{ URL::asset('frontend/icons/3.png') }}" height="50" alt="">
                            </button>
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

@include('layouts.frontend.head')
<style>
    .btn-submit {
        background-color: unset;
        border: 0;
    }

    #BasicForm input {
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
                    <form id="BasicForm" action="{{ route('teacher.save_teacher_info') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" value="{{ old('first_name') }}" name="first_name"
                                class="form-control  @error('first_name') is-invalid @enderror header-search"
                                autocomplete="off">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" value="{{ old('surname') }}" name="surname"
                                class="form-control  @error('surname') is-invalid @enderror header-search"
                                autocomplete="off">
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Teacher Email</label>
                            <input type="email" value="{{ old('email') }}" name="email"
                                class="form-control @error('email') is-invalid @enderror header-search"
                                autocomplete="off">
                            @error('email')
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

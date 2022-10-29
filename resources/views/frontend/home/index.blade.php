@include('layouts.frontend.head')
<div class="banner">
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="home-content">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" class="home-image" alt="">
                        <div class="display-flex">
                            <div><a href="/find-teacher" class="btn home-button">Find a Teacher</a></div>
                            <div class="ml-2"><a href="/create-teacher" class="btn home-button">Create a Teacher
                                    Profile</a>
                            </div>
                        </div>
                    </div>
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

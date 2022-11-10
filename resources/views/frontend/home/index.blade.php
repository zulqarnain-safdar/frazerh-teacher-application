@include('layouts.frontend.head')
<div class="banner">
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="home-sec">
                        <div>
                            <img src="{{ URL::asset('frontend/image/image1.png') }}" alt="">
                        </div>
                        <div style="display: inline-block;margin-top:18px;">
                            <a href="/find-teacher" class="btn home-button">Find a Teacher</a></div>
                            <a href="/create-teacher" class="btn login-nav-btn home-button">Create a Teacher
                                    Profile</a>
                            
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

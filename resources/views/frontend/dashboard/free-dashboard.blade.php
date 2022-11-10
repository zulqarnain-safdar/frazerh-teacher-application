@include('layouts.frontend.head')
<style>
    .white-box {
        background-color: #f9fbfc;
        border-radius: 20px;
        font-weight: 500;
        height: 175px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    

    a {
        text-decoration: none;
        color: black;
    }

    .premium-button-text {
        background-color: #ffde59;
        padding: 12px 72px;
        margin-top: 22px;
        margin-left: 5px;
        border-radius: 25px;
        color: black;
        font-weight: 700;
    }

    .upgrade-button {
        position: relative;
        top: 40px;
    }
    .parent-section{
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    }
    .btn-teacher{
    background-color: #3cf7f7;
    margin-top: 28px;
    border-radius: 25px;
    color: black;
    font-weight: 600;
    margin-top: 150px;
    margin-bottom: 40px;
    }
    .password-style-new{
    position: relative;
    z-index: 555;
    padding-bottom: 85px;
    }
</style>
<div class="banner">
    <section class="password-section password-style-new">
        <div class="display-flex justify-content-space-between">
            <div>
                <a href="javascript::void(0)" class="btn logout-button-text ml-3"><b>FREE DASHBOARD</b></a>
            </div>
            {{-- <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="javascript::void(0)" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="btn logout-button-text"><b>LOGOUT</b></a>
                </form>
            </div> --}}

        </div>
        <div class="container-fluid text-center" >
            <div class="row">
                <div class="col-12">
                    <div class="parent-section">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" style="width:150px" alt="">
                    </div>
                    <a href="/{{ auth()->user()->profile()->first()->profile_name }}" class="btn btn-teacher"><b>/{{
                            auth()->user()->profile()->first()->profile_name
                            }}</b></a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="white-box padding-72">
                        <a href="/edit-teacher-profile">Edit My Profile</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="white-box padding-60">
                        <a href="/reset-password">Reset<br>Password</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- <div class="white-box padding-72">
                        <a href="/">LOGOUT</a>
                    </div> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="white-box padding-72">
                            <a href="javascript::void(0)"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-5 upgrade-button">
                <img src="{{ URL::asset('frontend/icons/4.png') }}" style="width:100px" alt="">
                <a href="/pricing" class="btn premium-button-text"><b>UPGRADE</b></a>
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
@include('layouts.frontend.head1')
<style>
    .search-seaction {
        margin-top: 20px;
    }

    .box {
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .box1 {
        padding: 28px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .add {
        padding: 150px;
        background-color: #d9d9d9;
        border-radius: 24px;
        margin-top: 15px;
    }

    .ml-5 {
        margin-left: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .email-text {
        font-size: 22px;
        margin-left: 10px;
        word-wrap: anywhere;
    }

    .img-fluid {
        width: 100%;
        height: 60vh;
        object-fit: cover;
    }

    p {
        text-align: justify;
    }

    .text-right {
        text-align: right;
        margin-right:20px;
    }

    .fa-star {
        color: #ffc319;
    }

    .rating {
        color: #ffc319;
    }

    .margin-right-50 {
        margin-right: 50px;
    }

    .margin-right-22 {
        margin-right: 22px;
    }

    .package-div {
        text-align: center;
        background-color: #0fba34;
        color: #fff;
        padding: 2px;
        margin-top: 15px;
        font-weight: 600;
    }

    .review-button {
        background-color: #4b824e;
        color: #fff;
        border: none;
        padding: 2px 22px;
    }

    .booking-div {
        text-align: center;
        background-color: #122d7d;
        color: #fff;
        padding: 15px;
        margin-top: 15px;
        font-weight: 600;
    }

    .package-div a {
        text-decoration: none;
        color: #fff;
    }

    .booking-div a {
        text-decoration: none;
        color: #fff;
    }

    .ml-5 {
        margin-left: 5px;
    }

    .m-12 {
        margin: 12px;
    }

    .review-box {
        display: flex;
        padding: 7px 8px;
        background-color: #f7f7f7;
        border-radius: 5px;
        margin: 12px;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }

    .modal {
        text-align: center;
        /* padding: 0 !important; */
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .ml-3
    {
        margin-left: 3px;
    }



    .modal-content {
        border-radius: 30px;
        background-color: #586e82;
        padding: 10px;
    }

    .input-42 {
        height: 42px;
        margin-bottom: 15px;
    }

    .border-radius-20 {
        border-radius: 20px;
    }

    label {
        color: #fff;
        margin-left: 5px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    textarea {
        height: 200px;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 58px;
        color: #fff;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 58px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }
    .ml-15
    {
    margin-left: 15px;
    }
</style>
<div>
    <section class="search-seaction">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                    <div class="box">
                        @if ($profile->video_url != null)
                            <iframe class="img-fluid" src="{{ str_replace('watch?v=', 'embed/', $profile->video_url) }}">
                            </iframe>
                        @else
                            <img src="{{ URL::asset('storage/covers/') }}/{{ $profile->cover_photo }}" class="img-fluid"
                                alt="">
                        @endif
                        <div class="mt-3 display-flex justify-content-space-between">
                            <div class="display-flex">
                                <h4><b>{{ $profile->teacher_name }}</b></h4><span class="ml-15 font-10">from {{ $profile->nationality }}</span>
                            </div>
                            <div class="margin-right-22">
                                <h4>Speaks: {{ implode(', ', $profile->languages) }}</h4>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <div class="text-center">
                                    <img src="{{ URL::asset('storage/profiles/') }}/{{ $profile->profile_image }}"
                                        style="border-radius:50%" height="80" width="80" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="headline"><b>{{ $profile->headline }}</b></h5>
                                <h5><b>Teaches: {{ implode(', ', $profile->subjects_taught) }}</b></h5>
                                <ul>
                                    @foreach ($profile->qualifications as $qualification)
                                        <li>{{ $qualification }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-5">
                                <div class="text-right">
                                    @if ($profile->reviews->count() > 0)
                                        <div class="mb-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span
                                                class="rating">{{ number_format((float) $profile->reviews->avg('rating'), 1, '.', '') }}
                                            </span>
                                        </div>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span class="rating">N/A
                                        </span>
                                    @endif
                                    {{-- <h5 class="mb-2">415 LESSONS</h5>
                                    <h5>104 STUDENTS</h5> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2 class="mt-2">About Me</h2>
                        <p>{!! $profile->about_me !!}</p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box1">
                        <div class="display-flex justify-content-space-between">
                            <div>
                                <h5><b>Lessons</b></h5>
                            </div>
                            <div>
                                <h6><b>From ${{ $profile->lesson_price }}</b></h6>
                            </div>
                        </div>
                        @if ($profile->packages->isNotEmpty())
                            @foreach ($profile->packages as $package)
                                <div class="package-div">
                                    <a href="{{ $package->payment_url }}">{{ $package->p_name }}</a>
                                </div>
                            @endforeach

                        @endif

                        @if (isset($profile->trial_price))
                            <hr>
                            <div class="display-flex mt-5 justify-content-space-between">
                                <div>
                                    <h5><b>Trial</b></h5>
                                </div>
                                <div>
                                    <h6><b>From {{ $profile->trial_price }}</b></h6>
                                </div>
                            </div>
                            <div class="package-div">
                                <a
                                    href="{{ $profile->trial_booking_link != null ? $profile->trial_booking_link : $profile->trial_payment_url }}">Book
                                    Trial ({{ $profile->trial_price }})</a>
                            </div>
                        @endif
                        @if (isset($profile->booking_link))
                            <hr>
                            <div class="booking-div">
                                <a href="{{ $profile->booking_password == null ? $profile->booking_link : '#' }}"
                                    @if ($profile->booking_password != null) id="bookingPassword" data-profile_id={{ $profile->id }} @endif>Schedulle
                                    a Class (Regular Students)</a>
                            </div>
                        @endif
                        <hr>
                        <div>
                            <h5><b>Contact Teacher</b></h5>
                        </div>
                        @if (isset($profile->wechat))
                            <div class="mt-5">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/10.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->wechat }}</b></span>
                                </div>
                            </div>
                        @endif
                        @if (isset($profile->skype))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/8.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->skype }}</b></span>
                                </div>
                            </div>
                        @endif
                        @if (isset($profile->line))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/7.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->line }}</b></span>
                                </div>
                            </div>
                        @endif
                        @if (isset($profile->whatsapp))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/11.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->whatsapp }}</b></span>
                                </div>
                            </div>
                        @endif

                        @if (isset($profile->twitter))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/17.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->twitter }}</b></span>
                                </div>
                            </div>
                        @endif
                        @if (isset($profile->instagram))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/15.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->instagram }}</b></span>
                                </div>
                            </div>
                        @endif
                        @if (isset($profile->facebook))
                            <div class="mt-4">
                                <div>
                                    <img src="{{ URL::asset('frontend/icons/14.png') }}" height="30" alt="">
                                    <span class="ml-5"><b>{{ $profile->facebook }}</b></span>
                                </div>
                            </div>
                        @endif
                        <hr>
                        @if (session()->has('flash_msg_success'))
                            <div class="alert alert-success">
                                {{ session()->get('flash_msg_success') }}
                            </div>
                        @endif
                        @php
                            $reviews = $profile->reviews;
                        @endphp

                        <div class="display-flex m-12 mt-5 justify-content-space-between">
                            <div>
                                <h5><b>Reviews</b></h5>
                            </div>
                            <div>
                                <button class="review-button" data-toggle="modal" data-target="#reviewModal">Leave
                                    Review</button>
                            </div>
                        </div>
                        @if ($reviews->isNotEmpty())
                            @foreach ($reviews->where('status', 'Approved') as $review)
                                <div class="review-box">
                                    <div>
                                        <img src="{{ URL::asset('storage/profiles/') }}/{{ $review->image }}"
                                            style="border-radius:50%" height="40" width="40" alt="">
                                    </div>
                                    <div class="ml-5">
                                        <div class="display-flex">
                                            <h5 class="mb-0">{{ $review->name }}</h5>
                                            <span class="ml-3">({{ $review->nationality }})</span>
                                        </div>
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="profile_id" value={{ $profile->id }}>
                            <div class="row">
                                <div class="col-lg-2">
                                    <a href="javascript:void(0)"><img id="OpenProfileImgUpload"
                                            src="{{ URL::asset('frontend/icons/1.png') }}" style="border-radius:50%"
                                            height="120" width="120" alt=""></a>
                                    <input type="file" accept="image/jpeg, image/png" name="image"
                                        id="imgupload" class="profile_image" style="display:none" />
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ml-5">
                                        <label for="">Your Name</label>
                                        <input type="text" name="name" placeholder=""
                                            class="form-control input-42 border-radius-20" autocomplete="off">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nationality</label>

                                        <select id="country" name="nationality"
                                            class="form-control input-42 border-radius-20">
                                            <option selected disabled>Select Nationality</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                                Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                            </option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                                Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated
                                                States of
                                            </option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                Occupied
                                            </option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                            </option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia
                                                and
                                                The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                            </option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor
                                                Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1" style="margin-bottom: 30px">
                                    <div class="form-group">
                                        <div class="col">
                                            <div class="rate">
                                                <input type="radio" id="star5" class="rate" name="rating"
                                                    value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" class="rate" name="rating"
                                                    value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" class="rate" name="rating"
                                                    value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" class="rate" name="rating"
                                                    value="2">
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" class="rate" name="rating"
                                                    value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <p class="font-weight-bold text-white" style="margin-left: 20px;"><b>REVIEW</b>
                                    </p>
                                    <div class="form-group">
                                        <textarea name="review" id="" autocomplete="off" class="form-control textarea border-radius-20"
                                            cols="30" rows="10"></textarea>
                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="review-button mt-5" id="reviewButton">Leave
                                            Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
    $("#bookingPassword").click(function() {
        let profile_id = $(this).attr("data-profile_id")
        let password = prompt("Please enter booking password")

        $.ajax({
            type: 'POST',
            url: '{{ route('check_booking_password') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                profile_id: profile_id,
                password: password
            },
            success: function(data) {
                console.log(data.success)
                if (data.success == 'true') {
                    // window.location.href = data.redirect_url;
                    window.open(data.redirect_url, '_blank ');
                } else {
                    alert("password is wrong. Please try again!")
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });
    })

    $('#OpenProfileImgUpload').click(function() {
        $('#imgupload').trigger('click');
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#OpenProfileImgUpload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".profile_image").change(function() {
        readURL(this);
    });
</script>

</body>

</html>

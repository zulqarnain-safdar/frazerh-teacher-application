@include('layouts.frontend.head')
<style>
    select {
        width: 80%;
        height: 42px;
    }

    .search-seaction {
        margin: 62px ;
    }

    label {
        font-weight: 900;
        line-height: 2.6;
        font-size: 16px;
    }

    .teacher-profile-image
    {
        height: 100px;width: 100%;object-fit: fill;
    }

    .fa-check {
        color: #fff;
        position: relative;
        right: 22px;
        font-size: 12px;
    }

    .search-bar {
        padding: 15px;
        background-color: #f1f1f1;
        border-radius: 42px;
    }

    .img-res {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }


    p {
        text-align: justify;
        color: #898787;
        font-weight: 400;
    }

    .native-text {
        padding: 5px 8px;
        background-color: #e6f7f8;
        border-radius: 20px;
        color: #52c8d2;
        position: relative;
        bottom: 7px;
    }

    .ml-5 {
        margin-left: 5px;
    }

    .btn-primary {
        color: #fff;
        background-color: #227fbb;
        border-radius: 22px;
        border-color: #0d6efd;
    }

    .wrap-box {
        padding: 12px;
        background-color: #f3f4f7;
    }


    .profile-box {
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
    }

    .wrap-select {
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 24px;
    }

    .wrap-button {
        padding: 14px;
        text-align: center;
        background-color: #8c52ff;
        font-size: 28px;
        font-weight: 600;
        border-radius: 42px;
        margin-top: 20px;
    }

    .wrap-advertisement {
        padding: 28px;
        text-align: center;
        background-color: #8c52ff;
        ;
        border-radius: 30px;
        margin-top: 38px;
    }

    .add {
        padding: 28px;
        background-color: #fff;
        border-radius: 24px;
        margin-top: 15px;
    }

    .flex-space-between {
        justify-content: space-between;
    }

    .rating {
        color: #ffc319;
    }

    .mr-2 {
        margin-right: 2px;
    }
    .sort-select{
        display: none;
    }
    .sort{
        display: block;
    }
</style>
<div class="banner">
    <section class="search-seaction">
        <div class="container-fluid">
            <div>
                <div class="row search-bar">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">I want a/an</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <select name="subject" id="">
                            <option class="form-control" selected value="All">All</option>
                            @if ($subjects->isNotEmpty())
                            @foreach ($subjects->flatten()->unique() as $subject)
                            <option class="form-control" value="{{ $subject }}">{{ $subject }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Teacher From</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <select id="country" name="nationality">
                            <option selected value="All">All</option>
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
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory
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
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
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
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of
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
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
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
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
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
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and
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
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Who can also speek</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <select name="language">
                            <option selected value="All">All</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Basque">Basque</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cambodian">Cambodian</option>
                            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="English">English</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finnish">Finnish</option>
                            <option value="French">French</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Irish">Irish</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Javanese">Javanese</option>
                            <option value="Korean">Korean</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malay">Malay</option>
                            <option value="Malayalam">Malayalam</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Maori">Maori</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Nepali">Nepali</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Persian">Persian</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Quechua">Quechua</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish ">Swedish </option>
                            <option value="Tamil">Tamil</option>
                            <option value="Tatar">Tatar</option>
                            <option value="Telugu">Telugu</option>
                            <option value="Thai">Thai</option>
                            <option value="Tibetan">Tibetan</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Uzbek">Uzbek</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Xhosa">Xhosa</option>
                        </select>
                    </div>
                    <div class="col-lg-2 sort-select">
                        <div class="form-group">
                            <label for="">Sort By</label>
                        </div>
                    </div>
                    <div class="col-lg-2 sort-select">
                        <select name="sort_by" id="">
                            <option selected value="all">Sort By</option>
                            <option value="rating">Teachers Rating</option>
                            <option value="price">Price</option>
                            <option value="name">Name</option>
                            <option value="popularity">Popularity</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="search-seaction">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8" id="teacherProfiles">
                    @foreach ($profiles as $profile)
                    <div class="wrap-box">
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="text-center">
                                        <img class="mb-2 teacher-profile-image"
                                            src="{{ URL::asset('storage/profiles/') }}/{{ $profile->profile_image }}"
                                            style="border-radius:50%;"
                                            alt="">
                                        <span class="rating"><i class="fa fa-star mr-2"></i>{{ number_format((float)
                                            $profile->reviews->avg('rating'), 1, '.', '') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="display-flex flex-space-between">
                                        <div class="display-flex">
                                            <div>
                                                <h3>{{ $profile->teacher_name }}</h3>
                                            </div>
                                            @if($profile->user->account_type == 'Paid')
                                            <div style="margin-left: 10px">
                                                <img src="{{ URL::asset('frontend/icons/6.png') }}" height="23" alt="">

                                                <i class="fa fa-check"></i>

                                            </div>
                                            @endif
                                        </div>
                                        {{-- <div>
                                            <i class="fa fa-heart-o"></i>
                                        </div> --}}
                                    </div>
                                    <p>Teacher from {{ $profile->nationality }}</p>
                                    <div class="display-flex">
                                        <div class="display-flex">
                                            <p>Speaks: </p>
                                            <h5 class="ml-5">{{ implode(', ', $profile->languages) }}</h5>
                                        </div>
                                        <!--<div class="display-flex ml-5">-->
                                        <!--    <p class="native-text">Native</p>-->
                                        <!--    <h5 class="ml-5">English</h5>-->
                                        <!--</div>-->
                                    </div>
                                    <p><b>{{ \Illuminate\Support\Str::limit($profile->about_me,200,"...") }}</b></p>
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <div class="row price-div" >
                                                <div class="col-lg-5" style="margin-top:8px">
                                                    <b>USD {{ $profile->lesson_price }}</b> / Hour
                                                </div>
                                                <div class="col-lg-7">
                                                    <a href="/{{ $profile->profile_name }}"
                                                        class="btn btn-primary">Contact Teacher</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="wrap-select sort">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="mt-1">Sort By</label>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <select name="sort_by" id="">
                                    <option selected value="all">Sort By</option>
                                    <option value="rating">Teachers Rating</option>
                                    <option value="price">Price</option>
                                    <option value="name">Name</option>
                                    <option value="popularity">Popularity</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--<div class="wrap-button">-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-lg-12">-->
                    <!--            <a href="/create-teacher" style="color: black;text-decoration:none;">-->
                    <!--                <div>-->
                    <!--                    <i class="fa fa-plus"></i>-->
                    <!--                    Add My Teacher Profile-->
                    <!--                </div>-->

                    <!--            </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    @if(isset($profile_ads))
                    <div class="wrap-advertisement">
                        <div class="row">
                            
                            @foreach ($profile_ads as $add)
                            <div class="add">
                                <a href="{{ $add->link }}">
                                    <img src="{{ URL::asset('storage/ads') }}/{{ $add->image }}" class="img-res" alt="">
                                </a>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </section>


</div>
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>
<script>
    $('select[name="subject"]').on('change', function() {
        let subject = this.value;
        let nationality = $('select[name="nationality"]').find(":selected").val();
        let language = $('select[name="language"]').find(":selected").val();
        let sort_by = $('select[name="sort_by"]').find(":selected").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('get_teachers_profiles') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                subject: subject,
                nationality: nationality,
                language: language,
                sort_by: sort_by
            },
            success: function(data) {
                if (data.success == true) {
                    $("#teacherProfiles").html(data.htmlResponse)
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });

    });

    $('select[name="nationality"]').on('change', function() {
        let nationality = this.value;
        let subject = $('select[name="subject"]').find(":selected").val();
        let language = $('select[name="language"]').find(":selected").val();
        let sort_by = $('select[name="sort_by"]').find(":selected").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('get_teachers_profiles') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                subject: subject,
                nationality: nationality,
                language: language,
                sort_by: sort_by
            },
            success: function(data) {
                if (data.success == true) {
                    $("#teacherProfiles").html(data.htmlResponse)
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });

    });

    $('select[name="language"]').on('change', function() {
        let language = this.value;
        let subject = $('select[name="subject"]').find(":selected").val();
        let nationality = $('select[name="nationality"]').find(":selected").val();
        let sort_by = $('select[name="sort_by"]').find(":selected").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('get_teachers_profiles') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                subject: subject,
                nationality: nationality,
                language: language,
                sort_by: sort_by
            },
            success: function(data) {
                if (data.success == true) {
                    $("#teacherProfiles").html(data.htmlResponse)
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });

    });

    $('select[name="sort_by"]').on('change', function() {

        let sort_by = this.value;
        let subject = $('select[name="subject"]').find(":selected").val();
        let nationality = $('select[name="nationality"]').find(":selected").val();
        let language = $('select[name="language"]').find(":selected").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('get_teachers_profiles') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                subject: subject,
                nationality: nationality,
                language: language,
                sort_by: sort_by
            },
            success: function(data) {
                if (data.success == true) {
                    $("#teacherProfiles").html(data.htmlResponse)
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });

    });
</script>
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
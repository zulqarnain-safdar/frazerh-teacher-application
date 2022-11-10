@include('layouts.frontend.head')

<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/select2/dist/css/select2.min.css') }}">

<style>
    #profileForm {
        padding: 30px;
    }

    #profileForm .border-right-line {
        border-right: 4px solid #fff;
    }

    #profileForm .input-42 {
        height: 42px;
        margin-bottom: 15px;
    }

    #profileForm .border-radius-20 {
        border-radius: 20px;
    }

    #profileForm label {
        color: #fff;
        margin-left: 5px;
        font-weight: 600;
        margin-bottom: 10px;
    }



    #profileForm .font-size-32 {
        font-size: 32px;
    }

    #profileForm .logo {
        width: 80px;
        position: absolute;
        right: 48px;
        top: 120px;
    }

    .textarea {
        border-radius: 24px;
    }

    .fa-angle-right {
        font-size: 38px;
        background-color: #2bd67c;
        color: #fff;
        border-radius: 50%;
        padding: 12px 20px;
        margin-top: 130px;
    }

    .btn-submit {
        background-color: unset;
        border: 0;
    }

    .modal-header {
        background-color: #586e82;
        color: #fff;
    }

    .select2-selection--multiple {
        border-radius: 20px !important;
        min-height: 42px;
        height: auto;
        margin-bottom: 10px;
    }

    .select2-selection__choice {
        display: flex;
    }

    .bootstrap-tagsinput {
        max-width: calc(100% - 5px);
        position: relative;
        width: 100%;
        min-height: 42px;
        height: auto;
        border-radius: 20px;
        margin-bottom: 10px;
        padding: 10px;
    }

    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
        background-color: #586e82;
        padding: 0 10px;
        position: relative;
        top: 5px;
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .remove-button {
        position: absolute;
        right: 4px;
        top: 4px;
    }

    .ml-5 {
        margin-left: 5px !important;
    }

    .margin-top-12 {
        margin-top: 12px;
    }

    .invalid-feedback {
        display: block;
    }
    .btn-submit
    {
        padding: 12px 25px;
        background-color: #0fba34;
        border-radius: 5px;
        font-size: 18px;
        color: #fff;
        font-weight: 600;
            
    }

    .profile-section label
    {
        margin-top: 20px;
    }
    .profile-section #OpenProfileImgUpload
    {
        margin-top: 20px;
    }

    




</style>
<div class="banner">
    <section class="profile-section">
        <div>
            <a href="javascript::void(0)" class="btn detail-button-text"><b>ENTER DETAILS</b></a>
        </div>
        <form action="{{ route('save_teacher_profile') }}" method="POST" id="profileForm" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 border-right-line">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <a href="javascript:void(0)"><img id="OpenProfileImgUpload"
                                        src="{{ URL::asset('frontend/icons/1.png') }}" style="border-radius:50%"
                                        height="120" width="120" alt=""></a>
                                <input type="file" accept="image/jpeg, image/png" name="profile_image" id="imgupload"
                                    class="profile_image" style="display:none" />
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Teacher Name</label>
                                    <input type="text" value="{{ old('teacher_name') }}" name="teacher_name"
                                        placeholder="Example: Teacher john"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                    @error('teacher_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-white">
                                    Cover Photo <a href="javascript:void(0)"><img id="OpenCoverImgUpload" class="ml-2"
                                            src="{{ URL::asset('frontend/icons/2.png') }}" height="30"
                                            alt=""></a>

                                    <input type="file" accept="image/jpeg, image/png" name="cover_photo"
                                        id="coverImgupload" class="cover-photo" style="display:none" />
                                    <div class="cover-photo-text text-white"></div>
                                    @error('cover_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nationality</label>

                                    <select id="country" value="{{ old('nationality') }}" name="nationality"
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
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" value="{{ old('gender') }}"
                                        class="form-control input-42 border-radius-20">
                                        <option selected disabled>Select Gender</option>
                                        <option value="Male" {{ ( old("gender") == 'Male' ? "selected":"") }}>Male</option>
                                        <option value="Female" {{ ( old("gender") == 'Female' ? "selected":"") }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Subject Taught</label>
                                    <input type="text" value="{{ old('subjects_taught') }}" data-role="tagsinput"
                                        name="subjects_taught" class="form-control input-42 border-radius-20"
                                        autocomplete="off">
                                    @error('subjects_taught')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Languages Spoken</label>
                                    <select name="languages[]" value="{{ old('languages[]') }}"
                                        class="form-control select2" multiple="">
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
                                    @error('languages')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Teacher Headline</label>
                                    <input type="text" value="{{ old('headline') }}" name="headline"
                                        placeholder="Example:Teacher John, Mr Tony"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                    @error('headline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label for="">Qualifications</label>
                                    <input type="text" value="{{ old('qualifications') }}" data-role="tagsinput"
                                        name="qualifications" class="form-control input-42 border-radius-20"
                                        autocomplete="off">
                                    @error('qualifications')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Lessons</label>
                                    <span class="text-white">From Price (include currency simble in
                                        textbox)</span>
                                    <input type="number" value="{{ old('lesson_price') }}" name="lesson_price" placeholder="$25"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                    @error('lesson_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 border-right-line">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="font-size-32">Intro Video URL</label>
                                    <input type="text" value="{{ old('video_url') }}" name="video_url"
                                        placeholder="www.youtube.com/sfsdfdsf"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>

                            </div>
                            
                            <div class="col-lg-8">
                                <div class="form-group mb-3">
                                    <label for="">Packages</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"
                                        style="background-color: #122d7d !important;color:#ffde59;font-weigth:600"
                                        class="btn btn-primary form-control"><i class="fa fa-plus"
                                            style="float:left;margin-top:5px;"></i>
                                        Add Package</a>
                                </div>
                                <div id="packageSuccessMessage" class="text-white mb-3"></div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">TRIAL</label>
                                    <span class="text-white">From Price (include currency simble in
                                        textbox)</span>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('trial_price') }}" name="trial_price"
                                        placeholder="$25" class="form-control input-42 border-radius-20"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('trial_payment_url') }}"
                                        name="trial_payment_url" placeholder="Payment URL"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" value="{{ old('trial_booking_link') }}"
                                        name="trial_booking_link" placeholder="Add Booking Link if Trial is free"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="ml-5">Regular Student bookings</label>
                                    <p class="text-white ml-5">Add booking link</p>
                                    <input type="text" value="{{ old('booking_link') }}" name="booking_link"
                                        placeholder="" class="form-control input-42 border-radius-20"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-white ml-5">Add Password(Optional)</span>
                                    <input type="password" value="{{ old('booking_password') }}"
                                        name="booking_password" placeholder=""
                                        class="form-control input-42 border-radius-20 margin-top-12"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">CONTACT INFO</label>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <img class="logo" src="{{ URL::asset('frontend/image/image1.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 mt-2">
                                <div class="form-group">
                                    <label for="">EMAIL</label>
                                    <input type="email" value="{{ old('profile_email') }}" name="profile_email"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                    @error('profile_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">TWITTER</label>
                                    <input type="text" value="{{ old('twitter') }}" name="twitter"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">WHATSAPP</label>
                                    <input type="text" value="{{ old('whatsapp') }}" name="whatsapp"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Line</label>
                                    <input type="text" value="{{ old('line') }}" name="line"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Wechat</label>
                                    <input type="text" value="{{ old('wechat') }}" name="wechat"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">SKYPE</label>
                                    <input type="text" value="{{ old('skype') }}" name="skype"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">INSTAGRAM</label>
                                    <input type="text" value="{{ old('instagram') }}" name="instagram"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">FACEBOOK</label>
                                    <input type="text" value="{{ old('facebook') }}" name="facebook"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">PHONE</label>
                                    <input type="text" value="{{ old('phone_number') }}" name="phone_number"
                                        class="form-control input-42 border-radius-20" autocomplete="off">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-lg-11">
                        <label for="">About you</label>
                        <textarea name="about_me" id="" autocomplete="off" class="form-control textarea summernote" cols="30"
                            rows="10">{{ old('about_me') }}</textarea>
                        @error('about_me')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-1" style="display: flex;justify-content: center">
                        <div style="display: flex;flex-direction:column;align-items:center;justify-content: center;">
                            <center><button class="btn-submit" type="submit">
                                Submit
                            </button></center>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                        <button type="button" class="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Package name & price</label>
                            <input type="text" name="p_name" required placeholder="Example: 10 Classes ($100)"
                                class="form-control input-42 border-radius-20">
                            <div class="text-danger p_name_error_mesg" style="display: none">This field is required.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Payment URL</label>
                            <input type="text" name="p_url" required
                                class="form-control input-42 border-radius-20">
                            <div class="text-danger p_url_error_mesg" style="display: none">This field is required.
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal">Close</button>
                        <button id="packageButton" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/js/page/forms-advanced-forms.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ URL::asset('theme-assets/js/scripts.js') }}"></script>
<script src="{{ URL::asset('theme-assets/js/custom.js') }}"></script>




<script>
    $('#packageButton').click(function() {
        let p_name = $('input[name="p_name"]').val()
        let p_url = $('input[name="p_url"]').val()

        if (p_name == '') {
            $(".p_name_error_mesg").show()
        }

        if (p_url == '') {
            $(".p_url_error_mesg").show()

        }

        if (p_name == '' || p_url == '') {
            return;
        }

        $.ajax({
            type: 'POST',
            url: '{{ route('save_pakage') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                p_name: p_name,
                p_url: p_url
            },
            success: function(data) {
                if (data.success) {
                    $('input[name="p_name"]').val("")
                    $('input[name="p_url"]').val("")
                    document.getElementById("packageSuccessMessage").innerHTML =
                        'Package Added Successfully.';
                    setTimeout(function() {
                        document.getElementById("packageSuccessMessage").innerHTML = '';
                    }, 2000);
                    // $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('#exampleModal').modal('toggle');
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });
    });

    $('.closeModal').click(function() {
        // $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#exampleModal').modal('toggle');
    });

    $('#OpenProfileImgUpload').click(function() {
        $('#imgupload').trigger('click');
    });

    $('#OpenCoverImgUpload').click(function() {
        $('#coverImgupload').trigger('click');
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

    $(".cover-photo").change(function() {
        $(".cover-photo-text").text("")
        $(".cover-photo-text").text("cover photo uploaded.")
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

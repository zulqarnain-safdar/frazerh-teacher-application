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

    .text-ffde59 {
        color: #ffde59;
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
        <form action="{{ route('update_teacher_profile') }}" method="POST" id="profileForm"
            enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 border-right-line">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <a href="javascript:void(0)"><img id="OpenProfileImgUpload"
                                        src="{{ url('storage/profiles') }}/{{ $profile->profile_image }}"
                                        style="border-radius:50%" height="120" width="120" alt=""></a>
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
                                    <input type="text" value="{{ $profile->teacher_name }}" name="teacher_name"
                                        placeholder="Example: Teacher john"
                                        class="form-control input-42 border-radius-20">
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

                                    <select id="country" name="nationality"
                                        class="form-control input-42 border-radius-20">
                                        <option disabled>Select Nationality</option>
                                        <option value="Afghanistan"
                                            {{ $profile->nationality == 'Afghanistan' ? 'selected' : '' }}>
                                            Afghanistan</option>
                                        <option value="Åland Islands"
                                            {{ $profile->nationality == 'Åland Islands' ? 'selected' : '' }}>
                                            Åland
                                            Islands</option>
                                        <option {{ $profile->nationality == 'Albania' ? 'selected' : '' }}
                                            value="Albania">Albania</option>
                                        <option {{ $profile->nationality == 'Algeria' ? 'selected' : '' }}
                                            value="Algeria">Algeria</option>
                                        <option {{ $profile->nationality == 'American Samoa' ? 'selected' : '' }}
                                            value="American Samoa">American Samoa</option>
                                        <option {{ $profile->nationality == 'Andorra' ? 'selected' : '' }}
                                            value="Andorra">Andorra</option>
                                        <option {{ $profile->nationality == 'Angola' ? 'selected' : '' }}
                                            value="Angola">Angola</option>
                                        <option {{ $profile->nationality == 'Anguilla' ? 'selected' : '' }}
                                            value="Anguilla">Anguilla</option>
                                        <option {{ $profile->nationality == 'Antarctica' ? 'selected' : '' }}
                                            value="Antarctica">Antarctica</option>
                                        <option {{ $profile->nationality == 'Antigua and Barbuda' ? 'selected' : '' }}
                                            value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option {{ $profile->nationality == 'Argentina' ? 'selected' : '' }}
                                            value="Argentina">Argentina</option>
                                        <option {{ $profile->nationality == 'Armenia' ? 'selected' : '' }}
                                            value="Armenia">Armenia</option>
                                        <option {{ $profile->nationality == 'Aruba' ? 'selected' : '' }}
                                            value="Aruba">Aruba</option>
                                        <option {{ $profile->nationality == 'Australia' ? 'selected' : '' }}
                                            value="Australia">Australia</option>
                                        <option {{ $profile->nationality == 'Austria' ? 'selected' : '' }}
                                            value="Austria">Austria</option>
                                        <option {{ $profile->nationality == 'Azerbaijan' ? 'selected' : '' }}
                                            value="Azerbaijan">Azerbaijan</option>
                                        <option {{ $profile->nationality == 'Bahamas' ? 'selected' : '' }}
                                            value="Bahamas">Bahamas</option>
                                        <option {{ $profile->nationality == 'Bahrain' ? 'selected' : '' }}
                                            value="Bahrain">Bahrain</option>
                                        <option {{ $profile->nationality == 'Bangladesh' ? 'selected' : '' }}
                                            value="Bangladesh">Bangladesh</option>
                                        <option {{ $profile->nationality == 'Barbados' ? 'selected' : '' }}
                                            value="Barbados">Barbados</option>
                                        <option {{ $profile->nationality == 'Belarus' ? 'selected' : '' }}
                                            value="Belarus">Belarus</option>
                                        <option {{ $profile->nationality == 'Belgium' ? 'selected' : '' }}
                                            value="Belgium">Belgium</option>
                                        <option {{ $profile->nationality == 'Belize' ? 'selected' : '' }}
                                            value="Belize">Belize</option>
                                        <option {{ $profile->nationality == 'Benin' ? 'selected' : '' }}
                                            value="Benin">Benin</option>
                                        <option {{ $profile->nationality == 'Bermuda' ? 'selected' : '' }}
                                            value="Bermuda">Bermuda</option>
                                        <option {{ $profile->nationality == 'Bhutan' ? 'selected' : '' }}
                                            value="Bhutan">Bhutan</option>
                                        <option {{ $profile->nationality == 'Bolivia' ? 'selected' : '' }}
                                            value="Bolivia">Bolivia</option>
                                        <option
                                            {{ $profile->nationality == 'Bosnia and Herzegovina' ? 'selected' : '' }}
                                            value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option {{ $profile->nationality == 'Botswana' ? 'selected' : '' }}
                                            value="Botswana">Botswana</option>
                                        <option {{ $profile->nationality == 'Bouvet Island' ? 'selected' : '' }}
                                            value="Bouvet Island">Bouvet Island</option>
                                        <option {{ $profile->nationality == 'Brazil' ? 'selected' : '' }}
                                            value="Brazil">Brazil</option>
                                        <option
                                            {{ $profile->nationality == 'British Indian Ocean Territory' ? 'selected' : '' }}
                                            value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option {{ $profile->nationality == 'Brunei Darussalam' ? 'selected' : '' }}
                                            value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option {{ $profile->nationality == 'Bulgaria' ? 'selected' : '' }}
                                            value="Bulgaria">Bulgaria</option>
                                        <option {{ $profile->nationality == 'Burkina Faso' ? 'selected' : '' }}
                                            value="Burkina Faso">Burkina Faso</option>
                                        <option {{ $profile->nationality == 'Burundi' ? 'selected' : '' }}
                                            value="Burundi">Burundi</option>
                                        <option {{ $profile->nationality == 'Cambodia' ? 'selected' : '' }}
                                            value="Cambodia">Cambodia</option>
                                        <option {{ $profile->nationality == 'Cameroon' ? 'selected' : '' }}
                                            value="Cameroon">Cameroon</option>
                                        <option {{ $profile->nationality == 'Canada' ? 'selected' : '' }}
                                            value="Canada">Canada</option>
                                        <option {{ $profile->nationality == 'Cape Verde' ? 'selected' : '' }}
                                            value="Cape Verde">Cape Verde</option>
                                        <option {{ $profile->nationality == 'Cayman Islands' ? 'selected' : '' }}
                                            value="Cayman Islands">Cayman Islands</option>
                                        <option
                                            {{ $profile->nationality == 'Central African Republic' ? 'selected' : '' }}
                                            value="Central African Republic">Central African Republic</option>
                                        <option {{ $profile->nationality == 'Chad' ? 'selected' : '' }}
                                            value="Chad">Chad</option>
                                        <option {{ $profile->nationality == 'Chile' ? 'selected' : '' }}
                                            value="Chile">Chile</option>
                                        <option {{ $profile->nationality == 'China' ? 'selected' : '' }}
                                            value="China">China</option>
                                        <option {{ $profile->nationality == 'Christmas Island' ? 'selected' : '' }}
                                            value="Christmas Island">Christmas Island</option>
                                        <option
                                            {{ $profile->nationality == 'Cocos (Keeling) Islands' ? 'selected' : '' }}
                                            value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option {{ $profile->nationality == 'Colombia' ? 'selected' : '' }}
                                            value="Colombia">Colombia</option>
                                        <option {{ $profile->nationality == 'Comoros' ? 'selected' : '' }}
                                            value="Comoros">Comoros</option>
                                        <option {{ $profile->nationality == 'Congo' ? 'selected' : '' }}
                                            value="Congo">Congo</option>
                                        <option
                                            {{ $profile->nationality == 'Congo, The Democratic Republic of The' ? 'selected' : '' }}
                                            value="Congo, The Democratic Republic of The">Congo, The Democratic
                                            Republic of The</option>
                                        <option {{ $profile->nationality == 'Cook Islands' ? 'selected' : '' }}
                                            value="Cook Islands">Cook Islands</option>
                                        <option {{ $profile->nationality == 'Costa Rica' ? 'selected' : '' }}
                                            value="Costa Rica">Costa Rica</option>
                                        <option {{ $profile->nationality == "Cote D'ivoire" ? 'selected' : '' }}
                                            value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option {{ $profile->nationality == 'Croatia' ? 'selected' : '' }}
                                            value="Croatia">Croatia</option>
                                        <option {{ $profile->nationality == 'Cuba' ? 'selected' : '' }}
                                            value="Cuba">Cuba</option>
                                        <option {{ $profile->nationality == 'Cyprus' ? 'selected' : '' }}
                                            value="Cyprus">Cyprus</option>
                                        <option {{ $profile->nationality == 'Czech Republic' ? 'selected' : '' }}
                                            value="Czech Republic">Czech Republic</option>
                                        <option {{ $profile->nationality == 'Denmark' ? 'selected' : '' }}
                                            value="Denmark">Denmark</option>
                                        <option {{ $profile->nationality == 'Djibouti' ? 'selected' : '' }}
                                            value="Djibouti">Djibouti</option>
                                        <option {{ $profile->nationality == 'Dominica' ? 'selected' : '' }}
                                            value="Dominica">Dominica</option>
                                        <option {{ $profile->nationality == 'Dominican Republic' ? 'selected' : '' }}
                                            value="Dominican Republic">Dominican Republic</option>
                                        <option {{ $profile->nationality == 'Ecuador' ? 'selected' : '' }}
                                            value="Ecuador">Ecuador</option>
                                        <option {{ $profile->nationality == 'Egypt' ? 'selected' : '' }}
                                            value="Egypt">Egypt</option>
                                        <option {{ $profile->nationality == 'El Salvador' ? 'selected' : '' }}
                                            value="El Salvador">El Salvador</option>
                                        <option {{ $profile->nationality == 'Equatorial Guinea' ? 'selected' : '' }}
                                            value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option {{ $profile->nationality == 'Eritrea' ? 'selected' : '' }}
                                            value="Eritrea">Eritrea</option>
                                        <option {{ $profile->nationality == 'Estonia' ? 'selected' : '' }}
                                            value="Estonia">Estonia</option>
                                        <option {{ $profile->nationality == 'Ethiopia' ? 'selected' : '' }}
                                            value="Ethiopia">Ethiopia</option>
                                        <option
                                            {{ $profile->nationality == 'Falkland Islands (Malvinas)' ? 'selected' : '' }}
                                            value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                        </option>
                                        <option {{ $profile->nationality == 'Faroe Islands' ? 'selected' : '' }}
                                            value="Faroe Islands">Faroe Islands</option>
                                        <option {{ $profile->nationality == 'Fiji' ? 'selected' : '' }}
                                            value="Fiji">Fiji</option>
                                        <option {{ $profile->nationality == 'Finland' ? 'selected' : '' }}
                                            value="Finland">Finland</option>
                                        <option {{ $profile->nationality == 'France' ? 'selected' : '' }}
                                            value="France">France</option>
                                        <option {{ $profile->nationality == 'French Guiana' ? 'selected' : '' }}
                                            value="French Guiana">French Guiana</option>
                                        <option {{ $profile->nationality == 'French Polynesia' ? 'selected' : '' }}
                                            value="French Polynesia">French Polynesia</option>
                                        <option
                                            {{ $profile->nationality == 'French Southern Territories' ? 'selected' : '' }}
                                            value="French Southern Territories">French Southern Territories
                                        </option>
                                        <option {{ $profile->nationality == 'Gabon' ? 'selected' : '' }}
                                            value="Gabon">Gabon</option>
                                        <option {{ $profile->nationality == 'Gambia' ? 'selected' : '' }}
                                            value="Gambia">Gambia</option>
                                        <option {{ $profile->nationality == 'Georgia' ? 'selected' : '' }}
                                            value="Georgia">Georgia</option>
                                        <option {{ $profile->nationality == 'Germany' ? 'selected' : '' }}
                                            value="Germany">Germany</option>
                                        <option {{ $profile->nationality == 'Ghana' ? 'selected' : '' }}
                                            value="Ghana">Ghana</option>
                                        <option {{ $profile->nationality == 'Gibraltar' ? 'selected' : '' }}
                                            value="Gibraltar">Gibraltar</option>
                                        <option {{ $profile->nationality == 'Greece' ? 'selected' : '' }}
                                            value="Greece">Greece</option>
                                        <option {{ $profile->nationality == 'Greenland' ? 'selected' : '' }}
                                            value="Greenland">Greenland</option>
                                        <option {{ $profile->nationality == 'Grenada' ? 'selected' : '' }}
                                            value="Grenada">Grenada</option>
                                        <option {{ $profile->nationality == 'Guadeloupe' ? 'selected' : '' }}
                                            value="Guadeloupe">Guadeloupe</option>
                                        <option {{ $profile->nationality == 'Guam' ? 'selected' : '' }}
                                            value="Guam">Guam</option>
                                        <option {{ $profile->nationality == 'Guatemala' ? 'selected' : '' }}
                                            value="Guatemala">Guatemala</option>
                                        <option {{ $profile->nationality == 'Guernsey' ? 'selected' : '' }}
                                            value="Guernsey">Guernsey</option>
                                        <option {{ $profile->nationality == 'Guinea' ? 'selected' : '' }}
                                            value="Guinea">Guinea</option>
                                        <option {{ $profile->nationality == 'Guinea-bissau' ? 'selected' : '' }}
                                            value="Guinea-bissau">Guinea-bissau</option>
                                        <option {{ $profile->nationality == 'Guyana' ? 'selected' : '' }}
                                            value="Guyana">Guyana</option>
                                        <option {{ $profile->nationality == 'Haiti' ? 'selected' : '' }}
                                            value="Haiti">Haiti</option>
                                        <option
                                            {{ $profile->nationality == 'Heard Island and Mcdonald Islands' ? 'selected' : '' }}
                                            value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                            Islands</option>
                                        <option
                                            {{ $profile->nationality == 'Holy See (Vatican City State)' ? 'selected' : '' }}
                                            value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                        </option>
                                        <option {{ $profile->nationality == 'Honduras' ? 'selected' : '' }}
                                            value="Honduras">Honduras</option>
                                        <option {{ $profile->nationality == 'Hong Kong' ? 'selected' : '' }}
                                            value="Hong Kong">Hong Kong</option>
                                        <option {{ $profile->nationality == 'Hungary' ? 'selected' : '' }}
                                            value="Hungary">Hungary</option>
                                        <option {{ $profile->nationality == 'Iceland' ? 'selected' : '' }}
                                            value="Iceland">Iceland</option>
                                        <option {{ $profile->nationality == 'India' ? 'selected' : '' }}
                                            value="India">India</option>
                                        <option {{ $profile->nationality == 'Indonesia' ? 'selected' : '' }}
                                            value="Indonesia">Indonesia</option>
                                        <option
                                            {{ $profile->nationality == 'Iran, Islamic Republic of' ? 'selected' : '' }}
                                            value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option {{ $profile->nationality == 'Iraq' ? 'selected' : '' }}
                                            value="Iraq">Iraq</option>
                                        <option {{ $profile->nationality == 'Ireland' ? 'selected' : '' }}
                                            value="Ireland">Ireland</option>
                                        <option {{ $profile->nationality == 'Isle of Man' ? 'selected' : '' }}
                                            value="Isle of Man">Isle of Man</option>
                                        <option {{ $profile->nationality == 'Israel' ? 'selected' : '' }}
                                            value="Israel">Israel</option>
                                        <option {{ $profile->nationality == 'Italy' ? 'selected' : '' }}
                                            value="Italy">Italy</option>
                                        <option {{ $profile->nationality == 'Jamaica' ? 'selected' : '' }}
                                            value="Jamaica">Jamaica</option>
                                        <option {{ $profile->nationality == 'Japan' ? 'selected' : '' }}
                                            value="Japan">Japan</option>
                                        <option {{ $profile->nationality == 'Jersey' ? 'selected' : '' }}
                                            value="Jersey">Jersey</option>
                                        <option {{ $profile->nationality == 'Jordan' ? 'selected' : '' }}
                                            value="Jordan">Jordan</option>
                                        <option {{ $profile->nationality == 'Kazakhstan' ? 'selected' : '' }}
                                            value="Kazakhstan">Kazakhstan</option>
                                        <option {{ $profile->nationality == 'Kenya' ? 'selected' : '' }}
                                            value="Kenya">Kenya</option>
                                        <option {{ $profile->nationality == 'Kiribati' ? 'selected' : '' }}
                                            value="Kiribati">Kiribati</option>
                                        <option
                                            {{ $profile->nationality == "Korea, Democratic People's Republic of" ? 'selected' : '' }}
                                            value="Korea, Democratic People's Republic of">Korea, Democratic
                                            People's Republic of</option>
                                        <option {{ $profile->nationality == 'Korea, Republic of' ? 'selected' : '' }}
                                            value="Korea, Republic of">Korea, Republic of</option>
                                        <option {{ $profile->nationality == 'Kuwait' ? 'selected' : '' }}
                                            value="Kuwait">Kuwait</option>
                                        <option {{ $profile->nationality == 'Kyrgyzstan' ? 'selected' : '' }}
                                            value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option
                                            {{ $profile->nationality == "Lao People's Democratic Republic" ? 'selected' : '' }}
                                            value="Lao People's Democratic Republic">Lao People's Democratic
                                            Republic</option>
                                        <option {{ $profile->nationality == 'Latvia' ? 'selected' : '' }}
                                            value="Latvia">Latvia</option>
                                        <option {{ $profile->nationality == 'Lebanon' ? 'selected' : '' }}
                                            value="Lebanon">Lebanon</option>
                                        <option {{ $profile->nationality == 'Lesotho' ? 'selected' : '' }}
                                            value="Lesotho">Lesotho</option>
                                        <option {{ $profile->nationality == 'Liberia' ? 'selected' : '' }}
                                            value="Liberia">Liberia</option>
                                        <option
                                            {{ $profile->nationality == 'Libyan Arab Jamahiriya' ? 'selected' : '' }}
                                            value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option {{ $profile->nationality == 'Liechtenstein' ? 'selected' : '' }}
                                            value="Liechtenstein">Liechtenstein</option>
                                        <option {{ $profile->nationality == 'Lithuania' ? 'selected' : '' }}
                                            value="Lithuania">Lithuania</option>
                                        <option {{ $profile->nationality == 'Luxembourg' ? 'selected' : '' }}
                                            value="Luxembourg">Luxembourg</option>
                                        <option {{ $profile->nationality == 'Macao' ? 'selected' : '' }}
                                            value="Macao">Macao</option>
                                        <option
                                            {{ $profile->nationality == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : '' }}
                                            value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                            Former Yugoslav Republic of</option>
                                        <option {{ $profile->nationality == 'Madagascar' ? 'selected' : '' }}
                                            value="Madagascar">Madagascar</option>
                                        <option {{ $profile->nationality == 'Malawi' ? 'selected' : '' }}
                                            value="Malawi">Malawi</option>
                                        <option {{ $profile->nationality == 'Malaysia' ? 'selected' : '' }}
                                            value="Malaysia">Malaysia</option>
                                        <option {{ $profile->nationality == 'Maldives' ? 'selected' : '' }}
                                            value="Maldives">Maldives</option>
                                        <option {{ $profile->nationality == 'Mali' ? 'selected' : '' }}
                                            value="Mali">Mali</option>
                                        <option {{ $profile->nationality == 'Malta' ? 'selected' : '' }}
                                            value="Malta">Malta</option>
                                        <option {{ $profile->nationality == 'Marshall Islands' ? 'selected' : '' }}
                                            value="Marshall Islands">Marshall Islands</option>
                                        <option {{ $profile->nationality == 'Martinique' ? 'selected' : '' }}
                                            value="Martinique">Martinique</option>
                                        <option {{ $profile->nationality == 'Mauritania' ? 'selected' : '' }}
                                            value="Mauritania">Mauritania</option>
                                        <option {{ $profile->nationality == 'Mauritius' ? 'selected' : '' }}
                                            value="Mauritius">Mauritius</option>
                                        <option {{ $profile->nationality == 'Mayotte' ? 'selected' : '' }}
                                            value="Mayotte">Mayotte</option>
                                        <option {{ $profile->nationality == 'Mexico' ? 'selected' : '' }}
                                            value="Mexico">Mexico</option>
                                        <option
                                            {{ $profile->nationality == 'Micronesia, Federated States of' ? 'selected' : '' }}
                                            value="Micronesia, Federated States of">Micronesia, Federated States of
                                        </option>
                                        <option
                                            {{ $profile->nationality == 'Moldova, Republic of' ? 'selected' : '' }}
                                            value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option {{ $profile->nationality == 'Monaco' ? 'selected' : '' }}
                                            value="Monaco">Monaco</option>
                                        <option {{ $profile->nationality == 'Mongolia' ? 'selected' : '' }}
                                            value="Mongolia">Mongolia</option>
                                        <option {{ $profile->nationality == 'Montenegro' ? 'selected' : '' }}
                                            value="Montenegro">Montenegro</option>
                                        <option {{ $profile->nationality == 'Montserrat' ? 'selected' : '' }}
                                            value="Montserrat">Montserrat</option>
                                        <option {{ $profile->nationality == 'Morocco' ? 'selected' : '' }}
                                            value="Morocco">Morocco</option>
                                        <option {{ $profile->nationality == 'Mozambique' ? 'selected' : '' }}
                                            value="Mozambique">Mozambique</option>
                                        <option {{ $profile->nationality == 'Myanmar' ? 'selected' : '' }}
                                            value="Myanmar">Myanmar</option>
                                        <option {{ $profile->nationality == 'Namibia' ? 'selected' : '' }}
                                            value="Namibia">Namibia</option>
                                        <option {{ $profile->nationality == 'Nauru' ? 'selected' : '' }}
                                            value="Nauru">Nauru</option>
                                        <option {{ $profile->nationality == 'Nepal' ? 'selected' : '' }}
                                            value="Nepal">Nepal</option>
                                        <option {{ $profile->nationality == 'Netherlands' ? 'selected' : '' }}
                                            value="Netherlands">Netherlands</option>
                                        <option
                                            {{ $profile->nationality == 'Netherlands Antilles' ? 'selected' : '' }}
                                            value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option {{ $profile->nationality == 'New Caledonia' ? 'selected' : '' }}
                                            value="New Caledonia">New Caledonia</option>
                                        <option {{ $profile->nationality == 'New Zealand' ? 'selected' : '' }}
                                            value="New Zealand">New Zealand</option>
                                        <option {{ $profile->nationality == 'Nicaragua' ? 'selected' : '' }}
                                            value="Nicaragua">Nicaragua</option>
                                        <option {{ $profile->nationality == 'Niger' ? 'selected' : '' }}
                                            value="Niger">Niger</option>
                                        <option {{ $profile->nationality == 'Nigeria' ? 'selected' : '' }}
                                            value="Nigeria">Nigeria</option>
                                        <option {{ $profile->nationality == 'Niue' ? 'selected' : '' }}
                                            value="Niue">Niue</option>
                                        <option {{ $profile->nationality == 'Norfolk Island' ? 'selected' : '' }}
                                            value="Norfolk Island">Norfolk Island</option>
                                        <option
                                            {{ $profile->nationality == 'Northern Mariana Islands' ? 'selected' : '' }}
                                            value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option {{ $profile->nationality == 'Norway' ? 'selected' : '' }}
                                            value="Norway">Norway</option>
                                        <option {{ $profile->nationality == 'Oman' ? 'selected' : '' }}
                                            value="Oman">Oman</option>
                                        <option {{ $profile->nationality == 'Pakistan' ? 'selected' : '' }}
                                            value="Pakistan">Pakistan</option>
                                        <option {{ $profile->nationality == 'Palau' ? 'selected' : '' }}
                                            value="Palau">Palau</option>
                                        <option
                                            {{ $profile->nationality == 'Palestinian Territory, Occupied' ? 'selected' : '' }}
                                            value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                        </option>
                                        <option {{ $profile->nationality == 'Panama' ? 'selected' : '' }}
                                            value="Panama">Panama</option>
                                        <option {{ $profile->nationality == 'Papua New Guinea' ? 'selected' : '' }}
                                            value="Papua New Guinea">Papua New Guinea</option>
                                        <option {{ $profile->nationality == 'Paraguay' ? 'selected' : '' }}
                                            value="Paraguay">Paraguay</option>
                                        <option {{ $profile->nationality == 'Peru' ? 'selected' : '' }}
                                            value="Peru">Peru</option>
                                        <option {{ $profile->nationality == 'Philippines' ? 'selected' : '' }}
                                            value="Philippines">Philippines</option>
                                        <option {{ $profile->nationality == 'Pitcairn' ? 'selected' : '' }}
                                            value="Pitcairn">Pitcairn</option>
                                        <option {{ $profile->nationality == 'Poland' ? 'selected' : '' }}
                                            value="Poland">Poland</option>
                                        <option {{ $profile->nationality == 'Portugal' ? 'selected' : '' }}
                                            value="Portugal">Portugal</option>
                                        <option {{ $profile->nationality == 'Puerto Rico' ? 'selected' : '' }}
                                            value="Puerto Rico">Puerto Rico</option>
                                        <option {{ $profile->nationality == 'Qatar' ? 'selected' : '' }}
                                            value="Qatar">Qatar</option>
                                        <option {{ $profile->nationality == 'Reunion' ? 'selected' : '' }}
                                            value="Reunion">Reunion</option>
                                        <option {{ $profile->nationality == 'Romania' ? 'selected' : '' }}
                                            value="Romania">Romania</option>
                                        <option {{ $profile->nationality == 'Russian Federation' ? 'selected' : '' }}
                                            value="Russian Federation">Russian Federation</option>
                                        <option {{ $profile->nationality == 'Rwanda' ? 'selected' : '' }}
                                            value="Rwanda">Rwanda</option>
                                        <option {{ $profile->nationality == 'Saint Helena' ? 'selected' : '' }}
                                            value="Saint Helena">Saint Helena</option>
                                        <option
                                            {{ $profile->nationality == 'Saint Kitts and Nevis' ? 'selected' : '' }}
                                            value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option {{ $profile->nationality == 'Saint Lucia' ? 'selected' : '' }}
                                            value="Saint Lucia">Saint Lucia</option>
                                        <option
                                            {{ $profile->nationality == 'Saint Pierre and Miquelon' ? 'selected' : '' }}
                                            value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option
                                            {{ $profile->nationality == 'Saint Vincent and The Grenadines' ? 'selected' : '' }}
                                            value="Saint Vincent and The Grenadines">Saint Vincent and The
                                            Grenadines</option>
                                        <option {{ $profile->nationality == 'Samoa' ? 'selected' : '' }}
                                            value="Samoa">Samoa</option>
                                        <option {{ $profile->nationality == 'San Marino' ? 'selected' : '' }}
                                            value="San Marino">San Marino</option>
                                        <option
                                            {{ $profile->nationality == 'Sao Tome and Principe' ? 'selected' : '' }}
                                            value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option {{ $profile->nationality == 'Saudi Arabia' ? 'selected' : '' }}
                                            value="Saudi Arabia">Saudi Arabia</option>
                                        <option {{ $profile->nationality == 'Senegal' ? 'selected' : '' }}
                                            value="Senegal">Senegal</option>
                                        <option {{ $profile->nationality == 'Serbia' ? 'selected' : '' }}
                                            value="Serbia">Serbia</option>
                                        <option {{ $profile->nationality == 'Seychelles' ? 'selected' : '' }}
                                            value="Seychelles">Seychelles</option>
                                        <option {{ $profile->nationality == 'Sierra Leone' ? 'selected' : '' }}
                                            value="Sierra Leone">Sierra Leone</option>
                                        <option {{ $profile->nationality == 'Singapore' ? 'selected' : '' }}
                                            value="Singapore">Singapore</option>
                                        <option {{ $profile->nationality == 'Slovakia' ? 'selected' : '' }}
                                            value="Slovakia">Slovakia</option>
                                        <option {{ $profile->nationality == 'Slovenia' ? 'selected' : '' }}
                                            value="Slovenia">Slovenia</option>
                                        <option {{ $profile->nationality == 'Solomon Islands' ? 'selected' : '' }}
                                            value="Solomon Islands">Solomon Islands</option>
                                        <option {{ $profile->nationality == 'Somalia' ? 'selected' : '' }}
                                            value="Somalia">Somalia</option>
                                        <option {{ $profile->nationality == 'South Africa' ? 'selected' : '' }}
                                            value="South Africa">South Africa</option>
                                        <option
                                            {{ $profile->nationality == 'South Georgia and The South Sandwich Islands' ? 'selected' : '' }}
                                            value="South Georgia and The South Sandwich Islands">South Georgia and
                                            The South Sandwich Islands</option>
                                        <option {{ $profile->nationality == 'Spain' ? 'selected' : '' }}
                                            value="Spain">Spain</option>
                                        <option {{ $profile->nationality == 'Sri Lanka' ? 'selected' : '' }}
                                            value="Sri Lanka">Sri Lanka</option>
                                        <option {{ $profile->nationality == 'Sudan' ? 'selected' : '' }}
                                            value="Sudan">Sudan</option>
                                        <option {{ $profile->nationality == 'Suriname' ? 'selected' : '' }}
                                            value="Suriname">Suriname</option>
                                        <option
                                            {{ $profile->nationality == 'Svalbard and Jan Mayen' ? 'selected' : '' }}
                                            value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option {{ $profile->nationality == 'Swaziland' ? 'selected' : '' }}
                                            value="Swaziland">Swaziland</option>
                                        <option {{ $profile->nationality == 'Sweden' ? 'selected' : '' }}
                                            value="Sweden">Sweden</option>
                                        <option {{ $profile->nationality == 'Switzerland' ? 'selected' : '' }}
                                            value="Switzerland">Switzerland</option>
                                        <option
                                            {{ $profile->nationality == 'Syrian Arab Republic' ? 'selected' : '' }}
                                            value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option {{ $profile->nationality == 'Taiwan' ? 'selected' : '' }}
                                            value="Taiwan">Taiwan</option>
                                        <option {{ $profile->nationality == 'Tajikistan' ? 'selected' : '' }}
                                            value="Tajikistan">Tajikistan</option>
                                        <option
                                            {{ $profile->nationality == 'Tanzania, United Republic of' ? 'selected' : '' }}
                                            value="Tanzania, United Republic of">Tanzania, United Republic of
                                        </option>
                                        <option {{ $profile->nationality == 'Thailand' ? 'selected' : '' }}
                                            value="Thailand">Thailand</option>
                                        <option {{ $profile->nationality == 'Timor-leste' ? 'selected' : '' }}
                                            value="Timor-leste">Timor-leste</option>
                                        <option {{ $profile->nationality == 'Togo' ? 'selected' : '' }}
                                            value="Togo">Togo</option>
                                        <option {{ $profile->nationality == 'Tokelau' ? 'selected' : '' }}
                                            value="Tokelau">Tokelau</option>
                                        <option {{ $profile->nationality == 'Tonga' ? 'selected' : '' }}
                                            value="Tonga">Tonga</option>
                                        <option {{ $profile->nationality == 'Trinidad and Tobago' ? 'selected' : '' }}
                                            value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option {{ $profile->nationality == 'Tunisia' ? 'selected' : '' }}
                                            value="Tunisia">Tunisia</option>
                                        <option {{ $profile->nationality == 'Turkey' ? 'selected' : '' }}
                                            value="Turkey">Turkey</option>
                                        <option {{ $profile->nationality == 'Turkmenistan' ? 'selected' : '' }}
                                            value="Turkmenistan">Turkmenistan</option>
                                        <option
                                            {{ $profile->nationality == 'Turks and Caicos Islands' ? 'selected' : '' }}
                                            value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option {{ $profile->nationality == 'Tuvalu' ? 'selected' : '' }}
                                            value="Tuvalu">Tuvalu</option>
                                        <option {{ $profile->nationality == 'Uganda' ? 'selected' : '' }}
                                            value="Uganda">Uganda</option>
                                        <option {{ $profile->nationality == 'Ukraine' ? 'selected' : '' }}
                                            value="Ukraine">Ukraine</option>
                                        <option
                                            {{ $profile->nationality == 'United Arab Emirates' ? 'selected' : '' }}
                                            value="United Arab Emirates">United Arab Emirates</option>
                                        <option {{ $profile->nationality == 'United Kingdom' ? 'selected' : '' }}
                                            value="United Kingdom">United Kingdom</option>
                                        <option {{ $profile->nationality == 'United States' ? 'selected' : '' }}
                                            value="United States">United States</option>
                                        <option
                                            {{ $profile->nationality == 'United States Minor Outlying Islands' ? 'selected' : '' }}
                                            value="United States Minor Outlying Islands">United States Minor
                                            Outlying Islands</option>
                                        <option {{ $profile->nationality == 'Uruguay' ? 'selected' : '' }}
                                            value="Uruguay">Uruguay</option>
                                        <option {{ $profile->nationality == 'Uzbekistan' ? 'selected' : '' }}
                                            value="Uzbekistan">Uzbekistan</option>
                                        <option {{ $profile->nationality == 'Vanuatu' ? 'selected' : '' }}
                                            value="Vanuatu">Vanuatu</option>
                                        <option {{ $profile->nationality == 'Venezuela' ? 'selected' : '' }}
                                            value="Venezuela">Venezuela</option>
                                        <option {{ $profile->nationality == 'Viet Nam' ? 'selected' : '' }}
                                            value="Viet Nam">Viet Nam</option>
                                        <option
                                            {{ $profile->nationality == 'Virgin Islands, British' ? 'selected' : '' }}
                                            value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option
                                            {{ $profile->nationality == 'Virgin Islands, U.S.' ? 'selected' : '' }}
                                            value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option {{ $profile->nationality == 'Wallis and Futuna' ? 'selected' : '' }}
                                            value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option {{ $profile->nationality == 'Western Sahara' ? 'selected' : '' }}
                                            value="Western Sahara">Western Sahara</option>
                                        <option {{ $profile->nationality == 'Yemen' ? 'selected' : '' }}
                                            value="Yemen">Yemen</option>
                                        <option {{ $profile->nationality == 'Zambia' ? 'selected' : '' }}
                                            value="Zambia">Zambia</option>
                                        <option {{ $profile->nationality == 'Zimbabwe' ? 'selected' : '' }}
                                            value="Zimbabwe">Zimbabwe</option>
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
                                    <select name="gender" class="form-control input-42 border-radius-20">
                                        <option disabled>Select Gender</option>
                                        <option {{ $profile->nationality == 'Male' ? 'selected' : '' }}
                                            value="Male">Male</option>
                                        <option {{ $profile->nationality == 'Female' ? 'selected' : '' }}
                                            value="Female">Female</option>
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
                                    <input type="text" value="{{ implode(',', $profile->subjects_taught) }}"
                                        data-role="tagsinput" name="subjects_taught"
                                        class="form-control input-42 border-radius-20">
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
                                    <select name="languages[]" class="form-control select2" multiple="">
                                        <option {{ in_array('Afrikaans', $profile->languages) ? 'selected' : '' }}
                                            value="Afrikaans">Afrikaans</option>
                                        <option {{ in_array('Albanian', $profile->languages) ? 'selected' : '' }}
                                            value="Albanian">Albanian</option>
                                        <option {{ in_array('Arabic', $profile->languages) ? 'selected' : '' }}
                                            value="Arabic">Arabic</option>
                                        <option {{ in_array('Armenian', $profile->languages) ? 'selected' : '' }}
                                            value="Armenian">Armenian</option>
                                        <option {{ in_array('Basque', $profile->languages) ? 'selected' : '' }}
                                            value="Basque">Basque</option>
                                        <option {{ in_array('Bengali', $profile->languages) ? 'selected' : '' }}
                                            value="Bengali">Bengali</option>
                                        <option {{ in_array('Bulgarian', $profile->languages) ? 'selected' : '' }}
                                            value="Bulgarian">Bulgarian</option>
                                        <option {{ in_array('Catalan', $profile->languages) ? 'selected' : '' }}
                                            value="Catalan">Catalan</option>
                                        <option {{ in_array('Cambodian', $profile->languages) ? 'selected' : '' }}
                                            value="Cambodian">Cambodian</option>
                                        <option
                                            {{ in_array('Chinese (Mandarin)', $profile->languages) ? 'selected' : '' }}
                                            value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                        <option {{ in_array('Croatian', $profile->languages) ? 'selected' : '' }}
                                            value="Croatian">Croatian</option>
                                        <option {{ in_array('Czech', $profile->languages) ? 'selected' : '' }}
                                            value="Czech">Czech</option>
                                        <option {{ in_array('Danish', $profile->languages) ? 'selected' : '' }}
                                            value="Danish">Danish</option>
                                        <option {{ in_array('Dutch', $profile->languages) ? 'selected' : '' }}
                                            value="Dutch">Dutch</option>
                                        <option {{ in_array('English', $profile->languages) ? 'selected' : '' }}
                                            value="English">English</option>
                                        <option {{ in_array('Estonian', $profile->languages) ? 'selected' : '' }}
                                            value="Estonian">Estonian</option>
                                        <option {{ in_array('Fiji', $profile->languages) ? 'selected' : '' }}
                                            value="Fiji">Fiji</option>
                                        <option {{ in_array('Finnish', $profile->languages) ? 'selected' : '' }}
                                            value="Finnish">Finnish</option>
                                        <option {{ in_array('French', $profile->languages) ? 'selected' : '' }}
                                            value="French">French</option>
                                        <option {{ in_array('Georgian', $profile->languages) ? 'selected' : '' }}
                                            value="Georgian">Georgian</option>
                                        <option {{ in_array('German', $profile->languages) ? 'selected' : '' }}
                                            value="German">German</option>
                                        <option {{ in_array('Greek', $profile->languages) ? 'selected' : '' }}
                                            value="Greek">Greek</option>
                                        <option {{ in_array('Gujarati', $profile->languages) ? 'selected' : '' }}
                                            value="Gujarati">Gujarati</option>
                                        <option {{ in_array('Hebrew', $profile->languages) ? 'selected' : '' }}
                                            value="Hebrew">Hebrew</option>
                                        <option {{ in_array('Hindi', $profile->languages) ? 'selected' : '' }}
                                            value="Hindi">Hindi</option>
                                        <option {{ in_array('Hungarian', $profile->languages) ? 'selected' : '' }}
                                            value="Hungarian">Hungarian</option>
                                        <option {{ in_array('Icelandic', $profile->languages) ? 'selected' : '' }}
                                            value="Icelandic">Icelandic</option>
                                        <option {{ in_array('Indonesian', $profile->languages) ? 'selected' : '' }}
                                            value="Indonesian">Indonesian</option>
                                        <option {{ in_array('Irish', $profile->languages) ? 'selected' : '' }}
                                            value="Irish">Irish</option>
                                        <option {{ in_array('Italian', $profile->languages) ? 'selected' : '' }}
                                            value="Italian">Italian</option>
                                        <option {{ in_array('Japanese', $profile->languages) ? 'selected' : '' }}
                                            value="Japanese">Japanese</option>
                                        <option {{ in_array('Javanese', $profile->languages) ? 'selected' : '' }}
                                            value="Javanese">Javanese</option>
                                        <option {{ in_array('Korean', $profile->languages) ? 'selected' : '' }}
                                            value="Korean">Korean</option>
                                        <option {{ in_array('Latin', $profile->languages) ? 'selected' : '' }}
                                            value="Latin">Latin</option>
                                        <option {{ in_array('Latvian', $profile->languages) ? 'selected' : '' }}
                                            value="Latvian">Latvian</option>
                                        <option {{ in_array('Lithuanian', $profile->languages) ? 'selected' : '' }}
                                            value="Lithuanian">Lithuanian</option>
                                        <option {{ in_array('Macedonian', $profile->languages) ? 'selected' : '' }}
                                            value="Macedonian">Macedonian</option>
                                        <option {{ in_array('Malay', $profile->languages) ? 'selected' : '' }}
                                            value="Malay">Malay</option>
                                        <option {{ in_array('Malayalam', $profile->languages) ? 'selected' : '' }}
                                            value="Malayalam">Malayalam</option>
                                        <option {{ in_array('Maltese', $profile->languages) ? 'selected' : '' }}
                                            value="Maltese">Maltese</option>
                                        <option {{ in_array('Maori', $profile->languages) ? 'selected' : '' }}
                                            value="Maori">Maori</option>
                                        <option {{ in_array('Marathi', $profile->languages) ? 'selected' : '' }}
                                            value="Marathi">Marathi</option>
                                        <option {{ in_array('Mongolian', $profile->languages) ? 'selected' : '' }}
                                            value="Mongolian">Mongolian</option>
                                        <option {{ in_array('Nepali', $profile->languages) ? 'selected' : '' }}
                                            value="Nepali">Nepali</option>
                                        <option {{ in_array('Norwegian', $profile->languages) ? 'selected' : '' }}
                                            value="Norwegian">Norwegian</option>
                                        <option {{ in_array('Persian', $profile->languages) ? 'selected' : '' }}
                                            value="Persian">Persian</option>
                                        <option {{ in_array('Polish', $profile->languages) ? 'selected' : '' }}
                                            value="Polish">Polish</option>
                                        <option {{ in_array('Portuguese', $profile->languages) ? 'selected' : '' }}
                                            value="Portuguese">Portuguese</option>
                                        <option {{ in_array('Punjabi', $profile->languages) ? 'selected' : '' }}
                                            value="Punjabi">Punjabi</option>
                                        <option {{ in_array('Quechua', $profile->languages) ? 'selected' : '' }}
                                            value="Quechua">Quechua</option>
                                        <option {{ in_array('Romanian', $profile->languages) ? 'selected' : '' }}
                                            value="Romanian">Romanian</option>
                                        <option {{ in_array('Russian', $profile->languages) ? 'selected' : '' }}
                                            value="Russian">Russian</option>
                                        <option {{ in_array('Samoan', $profile->languages) ? 'selected' : '' }}
                                            value="Samoan">Samoan</option>
                                        <option {{ in_array('Serbian', $profile->languages) ? 'selected' : '' }}
                                            value="Serbian">Serbian</option>
                                        <option {{ in_array('Slovak', $profile->languages) ? 'selected' : '' }}
                                            value="Slovak">Slovak</option>
                                        <option {{ in_array('Slovenian', $profile->languages) ? 'selected' : '' }}
                                            value="Slovenian">Slovenian</option>
                                        <option {{ in_array('Spanish', $profile->languages) ? 'selected' : '' }}
                                            value="Spanish">Spanish</option>
                                        <option {{ in_array('Swahili', $profile->languages) ? 'selected' : '' }}
                                            value="Swahili">Swahili</option>
                                        <option {{ in_array('Swedish', $profile->languages) ? 'selected' : '' }}
                                            value="Swedish">Swedish </option>
                                        <option {{ in_array('Tamil', $profile->languages) ? 'selected' : '' }}
                                            value="Tamil">Tamil</option>
                                        <option {{ in_array('Tatar', $profile->languages) ? 'selected' : '' }}
                                            value="Tatar">Tatar</option>
                                        <option {{ in_array('Telugu', $profile->languages) ? 'selected' : '' }}
                                            value="Telugu">Telugu</option>
                                        <option {{ in_array('Thai', $profile->languages) ? 'selected' : '' }}
                                            value="Thai">Thai</option>
                                        <option {{ in_array('Tibetan', $profile->languages) ? 'selected' : '' }}
                                            value="Tibetan">Tibetan</option>
                                        <option {{ in_array('Tonga', $profile->languages) ? 'selected' : '' }}
                                            value="Tonga">Tonga</option>
                                        <option {{ in_array('Turkish', $profile->languages) ? 'selected' : '' }}
                                            value="Turkish">Turkish</option>
                                        <option {{ in_array('Ukrainian', $profile->languages) ? 'selected' : '' }}
                                            value="Ukrainian">Ukrainian</option>
                                        <option {{ in_array('Urdu', $profile->languages) ? 'selected' : '' }}
                                            value="Urdu">Urdu</option>
                                        <option {{ in_array('Uzbek', $profile->languages) ? 'selected' : '' }}
                                            value="Uzbek">Uzbek</option>
                                        <option {{ in_array('Vietnamese', $profile->languages) ? 'selected' : '' }}
                                            value="Vietnamese">Vietnamese</option>
                                        <option {{ in_array('Welsh', $profile->languages) ? 'selected' : '' }}
                                            value="Welsh">Welsh</option>
                                        <option {{ in_array('Xhosa', $profile->languages) ? 'selected' : '' }}
                                            value="Xhosa">Xhosa</option>
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
                                    <input type="text" value="{{ $profile->headline }}" name="headline"
                                        placeholder="Example:Teacher John, Mr Tony"
                                        class="form-control input-42 border-radius-20">
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
                                    <input type="text" value="{{ implode(',', $profile->qualifications) }}"
                                        data-role="tagsinput" name="qualifications"
                                        class="form-control input-42 border-radius-20">
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
                                    <input type="number" value="{{ $profile->lesson_price }}" name="lesson_price" placeholder="$25"
                                        class="form-control input-42 border-radius-20">
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
                            <div class="col-lg-8 offset-lg-2 mt-2">
                                <div class="text-center">
                                    <p class="text-ffde59"><b>PREMIUM FEATURES</b></p>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="font-size-32">Intro Video URL</label>
                                    <input type="text" value="{{ $profile->video_url }}" name="video_url"
                                        placeholder="www.youtube.com/sfsdfdsf"
                                        class="form-control input-42 border-radius-20">
                                </div>

                            </div>
                            
                            <div class="col-lg-8 mb-3">
                                <div class="form-group mb-2">
                                    <label for="">Packages</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"
                                        style="background-color: #122d7d !important;color:#ffde59;font-weigth:600"
                                        class="btn btn-primary form-control"><i class="fa fa-plus"
                                            style="float:left;margin-top:5px;"></i>
                                        Add Package</a>
                                </div>
                                <div id="packageSuccessMessage" class="text-white mb-3"></div>
                                <a href="javascript:void(0)" class="text-white" id="packageLink">Click
                                    here to view added
                                    package list</a>

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
                                    <input type="number" value="{{ $profile->trial_price }}" name="trial_price"
                                        placeholder="$25" class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" value="{{ $profile->trial_payment_url }}"
                                        name="trial_payment_url" placeholder="Payment URL"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="text" value="{{ $profile->trial_booking_link }}"
                                        name="trial_booking_link" placeholder="Add Booking Link if Trial is free"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="ml-5">Regular Student bookings</label>
                                    <p class="text-white ml-5">Add booking link</p>
                                    <input type="text" value="{{ $profile->booking_link }}" name="booking_link"
                                        placeholder="" class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-white ml-5">Add Password(Optional)</span>
                                    <input type="password" value="{{ $profile->booking_password }}"
                                        name="booking_password" placeholder=""
                                        class="form-control input-42 border-radius-20 margin-top-12">
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
                            <div class="col-lg-8 offset-lg-2 mt-2">
                                <div class="text-center">
                                    <p class="text-white"><b>BASIC FEATURES</b></p>
                                    <div class="form-group">
                                        <label for="">EMAIL</label>
                                        <input type="email" value="{{ $profile->email }}" name="profile_email"
                                            class="form-control input-42 border-radius-20">
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-10 offset-lg-1">
                                <hr style="border:2px solid #fff;" class="text-white">
                            </div>
                            <div class="col-lg-8 offset-lg-2 mt-2">
                                <div class="text-center">
                                    <p class="text-ffde59"><b>PREMIUM FEATURES</b></p>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">TWITTER</label>
                                    <input type="text" value="{{ $profile->twitter }}" name="twitter"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">WHATSAPP</label>
                                    <input type="text" value="{{ $profile->whatsapp }}" name="whatsapp"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Line</label>
                                    <input type="text" value="{{ $profile->line }}" name="line"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Wechat</label>
                                    <input type="text" value="{{ $profile->wechat }}" name="wechat"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">SKYPE</label>
                                    <input type="text" value="{{ $profile->skype }}" name="skype"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">INSTAGRAM</label>
                                    <input type="text" value="{{ $profile->instagram }}" name="instagram"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">FACEBOOK</label>
                                    <input type="text" value="{{ $profile->facebook }}" name="facebook"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">PHONE</label>
                                    <input type="text" value="{{ $profile->phone_number }}" name="phone_number"
                                        class="form-control input-42 border-radius-20">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <p class="text-white">Premium features will only be displayed for Paid Accounts.</p>
                                <a href="/pricing" class="btn premium-button-text"><b>UPGRADE</b></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <label for="">About you</label>
                        <textarea name="about_me" id="" class="form-control textarea summernote" cols="30" rows="10">{{ $profile->about_me }}</textarea>
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
        <!-- Modal -->
        <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">All Packages</h5>
                        <button type="button" class="closePackageModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="packagesDiv">



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closePackageModal">Close</button>
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
            url: '{{ route('add_pakage') }}',
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

    $('.closePackageModal').click(function() {
        // $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#packageModal').modal('toggle');
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



    $("#packageLink").click(function() {
        $.ajax({
            type: 'POST',
            url: '{{ route('get_all_packages_list') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {

            },
            success: function(data) {
                if (data.success) {
                    $("#packagesDiv").html(data.htmlResponse)
                    $("#packageModal").modal("show")
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });
    })
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

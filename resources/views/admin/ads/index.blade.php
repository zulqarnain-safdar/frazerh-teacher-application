@extends('layouts.main')

@section('content')
<section class="section">
   <div class="row">
    <div class="col-lg-6">
        <form action="save-free-profile-ads" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h3>Free User Profile</h3>
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <div class="text-right" style="color:#000000;font-weight: 400;">
                            Ad 1
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if(isset($free_ads[0])) 
                        <div>
                            <div>
                                <a href="javascript:void(0)"  id="Openadd1ImgUpload"><img id="ad1Image" src="{{ URL::asset('storage/ads') }}/{{ $free_ads[0]['image'] }}" alt="" style="height:48px;width:48px;"></a>
                                
                                <input type="file" accept="image/jpeg, image/png" name="ad1_image" id="ad1Imgupload" class="ad1_image"
                                    style="display:none" />
                            </div>
                        </div>
                        @else
                        <div>
                            <div>
                                <a href="javascript:void(0)" id="Openadd1ImgUpload"><i class="fas fa-image fa-image-ad1"></i><img id="ad1Image"
                                        src="" alt=""
                                        style="display:none;height:48px;width:48px;"></a>
                        
                                <input type="file" accept="image/jpeg, image/png" name="ad1_image" id="ad1Imgupload" class="ad1_image"
                                    style="display:none" />
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <input type="url" value="{{ isset($free_ads[0]) ? $free_ads[0]['link'] : '' }}" placeholder="LINK" name="ad1_link" id="">
                            @error('ad1_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="text-right" style="color:#000000;font-weight: 400;">
                            Ad 2
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            @if(isset($free_ads[1]))
                            <div>
                                <a href="javascript:void(0)" id="Openadd2ImgUpload"><img id="ad2Image"
                                        src="{{ URL::asset('storage/ads') }}/{{ $free_ads[1]['image'] }}" alt="" style="height:48px;width:48px;"></a>
                            
                                <input type="file" accept="image/jpeg, image/png" name="ad2_image" id="ad2Imgupload" class="ad2_image"
                                    style="display:none" />
                            </div>
                            @else
                                <div>
                                    <a href="javascript:void(0)" id="Openadd2ImgUpload"><i class="fas fa-image fa-image-ad2"></i><img id="ad2Image"
                                            src="" alt="" style="display:none;height:48px;width:48px;"></a>
                                
                                    <input type="file" accept="image/jpeg, image/png" name="ad2_image" id="ad2Imgupload" class="ad2_image"
                                        style="display:none" />
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <input type="url" value="{{ isset($free_ads[1]) ? $free_ads[1]['link'] : '' }}" placeholder="LINK" name="ad2_link" id="">
                            @error('ad2_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="text-right" style="color:#000000;font-weight: 400;">
                            Ad 3
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div>
                                @if(isset($free_ads[2]))
                                <div>
                                    <a href="javascript:void(0)" id="Openadd3ImgUpload"><img id="ad3Image"
                                            src="{{ URL::asset('storage/ads') }}/{{ $free_ads[2]['image'] }}" alt="" style="height:48px;width:48px;"></a>
                                
                                    <input type="file" accept="image/jpeg, image/png" name="ad3_image" id="ad3Imgupload" class="ad3_image"
                                        style="display:none" />
                                </div>
                                @else
                                <div>
                                    <a href="javascript:void(0)" id="Openadd3ImgUpload"><i class="fas fa-image fa-image-ad3"></i><img id="ad3Image"
                                            src="" alt=""
                                            style="display:none;height:48px;width:48px;"></a>
                                
                                    <input type="file" accept="image/jpeg, image/png" name="ad3_image" id="ad3Imgupload" class="ad3_image"
                                        style="display:none" />
                                </div>
                                @endif
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <input type="url" value="{{ isset($free_ads[2]) ? $free_ads[2]['link'] : '' }}" placeholder="LINK" name="ad3_link" id="">
                            @error('ad3_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="text-right" style="color:#000000;font-weight: 400;">
                            Ad 4
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div>
                                @if(isset($free_ads[3]))
                                <div>
                                    <a href="javascript:void(0)" id="Openadd4ImgUpload"><img id="ad4Image"
                                            src="{{ URL::asset('storage/ads') }}/{{ $free_ads[3]['image'] }}" alt="" style="height:48px;width:48px;"></a>
                                
                                    <input type="file" accept="image/jpeg, image/png" name="ad4_image" id="ad4Imgupload" class="ad4_image"
                                        style="display:none" />
                                </div>
                                @else
                                <div>
                                    <a href="javascript:void(0)" id="Openadd4ImgUpload"><i class="fas fa-image fa-image-ad4"></i><img id="ad4Image"
                                            src="" alt=""
                                            style="display:none;height:48px;width:48px;"></a>
                                
                                    <input type="file" accept="image/jpeg, image/png" name="ad4_image" id="ad4Imgupload" class="ad4_image"
                                        style="display:none" />
                                </div>
                                @endif
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <input type="url" value="{{ isset($free_ads[3]) ? $free_ads[3]['link'] : '' }}" placeholder="LINK" name="ad4_link" id="">
                            @error('ad4_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <center>
                            <button class=" btn-save" type="submit"><b>Save</b></button>
                        </center>
                    </div>
                </div>
            
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <form action="save-search-page-profile-ads" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h3>Profile Search Page</h3>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="text-right" style="color:#000000;font-weight: 400;">
                        Ad 1
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(isset($profile_ads[0]))
                    <div>
                        <div>
                            <a href="javascript:void(0)" id="Openadd5ImgUpload"><img id="ad5Image"
                                    src="{{ URL::asset('storage/ads') }}/{{ $profile_ads[0]['image'] }}" alt=""
                                    style="height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad5_image" id="ad5Imgupload"
                                class="ad5_image" style="display:none" />
                        </div>
                    </div>
                    @else
                    <div>
                        <div>
                            <a href="javascript:void(0)" id="Openadd5ImgUpload"><i class="fas fa-image fa-image-ad5"></i><img
                                        id="ad5Image" src="" alt="" style="display:none;height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad5_image" id="ad5Imgupload"
                                class="ad5_image" style="display:none" />
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="url" value="{{ isset($profile_ads[0]) ? $profile_ads[0]['link'] : '' }}" placeholder="LINK"
                            name="ad1_link" id="">
                        @error('ad1_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="text-right" style="color:#000000;font-weight: 400;">
                        Ad 2
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        @if(isset($profile_ads[1]))
                        <div>
                            <a href="javascript:void(0)" id="Openadd6ImgUpload"><img id="ad6Image"
                                    src="{{ URL::asset('storage/ads') }}/{{ $profile_ads[1]['image'] }}" alt=""
                                    style="height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad6_image" id="ad6Imgupload"
                                class="ad6_image" style="display:none" />
                        </div>
                        @else
                        <div>
                            <a href="javascript:void(0)" id="Openadd6ImgUpload"><i class="fas fa-image fa-image-ad6"></i><img
                                    id="ad6Image" src="" alt="" style="display:none;height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad6_image" id="ad6Imgupload"
                                class="ad6_image" style="display:none" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="url" value="{{ isset($profile_ads[1]) ? $profile_ads[1]['link'] : '' }}" placeholder="LINK"
                            name="ad2_link" id="">
                        @error('ad2_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="text-right" style="color:#000000;font-weight: 400;">
                        Ad 3
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        @if(isset($profile_ads[2]))
                        <div>
                            <a href="javascript:void(0)" id="Openadd7ImgUpload"><img id="ad7Image"
                                    src="{{ URL::asset('storage/ads') }}/{{ $profile_ads[2]['image'] }}" alt=""
                                    style="height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad7_image" id="ad7Imgupload"
                                class="ad7_image" style="display:none" />
                        </div>
                        @else
                        <div>
                            <a href="javascript:void(0)" id="Openadd7ImgUpload"><i class="fas fa-image fa-image-ad7"></i><img
                                    id="ad7Image" src="" alt="" style="display:none;height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad7_image" id="ad7Imgupload"
                                class="ad7_image" style="display:none" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="url" value="{{ isset($profile_ads[2]) ? $profile_ads[2]['link'] : '' }}" placeholder="LINK"
                            name="ad3_link" id="">
                        @error('ad3_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="text-right" style="color:#000000;font-weight: 400;">
                        Ad 4
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        @if(isset($profile_ads[3]))
                        <div>
                            <a href="javascript:void(0)" id="Openadd8ImgUpload"><img id="ad8Image"
                                    src="{{ URL::asset('storage/ads') }}/{{ $profile_ads[3]['image'] }}" alt=""
                                    style="height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad8_image" id="ad8Imgupload"
                                class="ad8_image" style="display:none" />
                        </div>
                        @else
                        <div>
                            <a href="javascript:void(0)" id="Openadd8ImgUpload"><i class="fas fa-image fa-image-ad8"></i><img
                                    id="ad8Image" src="" alt="" style="display:none;height:48px;width:48px;"></a>
        
                            <input type="file" accept="image/jpeg, image/png" name="ad8_image" id="ad8Imgupload"
                                class="ad8_image" style="display:none" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="url" value="{{ isset($profile_ads[3]) ? $profile_ads[3]['link'] : '' }}" placeholder="LINK"
                            name="ad4_link" id="">
                        @error('ad4_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <center>
                        <button class=" btn-save" type="submit"><b>Save</b></button>
                    </center>
                </div>
            </div>
        
        </div>
        </form>
    </div>
   </div>
</section>

@endsection


@push('custom-css')
<style>
  h3
  {
    text-align: center;
    position: relative;
    left: 30px;
  }
  .fa-image
  {
    font-size: 48px !important;
    color: #000000;
   
  }
 
  .ad-title
  {
    color:#000000;
    font-weight: 400;
  }

  input
  {
    height: 28px;
    width: 200px;
    border-radius: 20px;
    margin-top: 8px !important;
    position: relative;
    left: 38px;
    text-align: center;
  }

  ::-webkit-input-placeholder { /* Edge */
   text-align: center;
   font-weight: 600;
  }

  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    text-align: center;
    font-weight: 600;
  }

  ::placeholder {
    text-align: center;
    font-weight: 600;
   }

   .btn-save
   {
    background-color: #e29823;
    padding: 8px 37px !important;
    color: #fff;
    margin-top: 50px;
    position: relative;
    left: 37px;
    border-radius: 5px;
   }
   .btn-save:hover
   {
        background-color: #e29823 !important;
        padding: 8px 37px !important;
        color: #fff;
   }
   .invalid-feedback
   {
    display: block;
    position: relative;
    left: 37px;
   }
</style>
@endpush
@push('scripts')
<script>
    //add 1
    $('#Openadd1ImgUpload').click(function() {
        $('#ad1Imgupload').trigger('click');
    });

    $(".ad1_image").change(function() {
        readAd1URL(this);
    });

    function readAd1URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad1Image').attr('src', e.target.result);
                $(".fa-image-ad1").hide()
                $('#ad1Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 1 script
    //add 2
    $('#Openadd2ImgUpload').click(function() {
        $('#ad2Imgupload').trigger('click');
    });

    $(".ad2_image").change(function() {
        readAd2URL(this);
    });

    function readAd2URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad2Image').attr('src', e.target.result);
                $(".fa-image-ad2").hide()
                $('#ad2Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 2 script
    //add 3
    $('#Openadd3ImgUpload').click(function() {
        $('#ad3Imgupload').trigger('click');
    });

    $(".ad3_image").change(function() {
        readAd3URL(this);
    });

    function readAd3URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad3Image').attr('src', e.target.result);
                $(".fa-image-ad3").hide()
                $('#ad3Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 3 script
    //add 4
    $('#Openadd4ImgUpload').click(function() {
        $('#ad4Imgupload').trigger('click');
    });

    $(".ad4_image").change(function() {
        readAd4URL(this);
    });

    function readAd4URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad4Image').attr('src', e.target.result);
                $(".fa-image-ad4").hide()
                $('#ad4Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 4 script
    //add 5
    $('#Openadd5ImgUpload').click(function() {
        $('#ad5Imgupload').trigger('click');
    });

    $(".ad5_image").change(function() {
        readAd5URL(this);
    });

    function readAd5URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad5Image').attr('src', e.target.result);
                $(".fa-image-ad5").hide()
                $('#ad5Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 5 script
    //add 6
    $('#Openadd6ImgUpload').click(function() {
        $('#ad6Imgupload').trigger('click');
    });

    $(".ad6_image").change(function() {
        readAd6URL(this);
    });

    function readAd6URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad6Image').attr('src', e.target.result);
                $(".fa-image-ad6").hide()
                $('#ad6Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 6 script
    //add 7
    $('#Openadd7ImgUpload').click(function() {
        $('#ad7Imgupload').trigger('click');
    });

    $(".ad7_image").change(function() {
        readAd7URL(this);
    });

    function readAd7URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad7Image').attr('src', e.target.result);
                $(".fa-image-ad7").hide()
                $('#ad7Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 7 script
    //add 8
    $('#Openadd8ImgUpload').click(function() {
        $('#ad8Imgupload').trigger('click');
    });

    $(".ad8_image").change(function() {
        readAd8URL(this);
    });

    function readAd8URL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#ad8Image').attr('src', e.target.result);
                $(".fa-image-ad8").hide()
                $('#ad8Image').show()
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }
    //end ad 8 script
</script>
@endpush
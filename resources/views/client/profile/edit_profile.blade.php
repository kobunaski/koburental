@extends('client.layout.index')

@section('content')
    @if($user_login)
        <div class="ui layout">

            <!-- grid -->
            <div class="ui grid container">

                <div class="row">

                    @include('client.profile.profile_menu')

                    <div
                        class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">

                        <div class="typo-header-sq">
                            <div class="ui grid">
                                <div class="row">
                                    <div class="ui twelve wide computer column">
                                        <h2>My Profile</h2>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">
                                        <ul class="inline-menu-sq list-default-sq list-style-inline-sq">
                                            <li class="active">
                                                <a href="">Edit Profile</a>
                                            </li>
                                            <li class="">
                                                <a href="">Verification</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet four wide computer four wide widescreen four wide large screen column">
                                        <p><strong>85%</strong> Profile Complete</p>
                                        <div class="basic-progressbar dashboard-progressbar-sq without-percentage-sq">
                                            <div class="inner" data-percentage="85%" style="width:58%"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <form action="profile/edit/{{$User -> id}}" method="POST"
                              enctype="multipart/form-data">
                            <div class="ui grid">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">

                                    <div
                                        class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">
                                        <div class="my-profile-avatar-container">
                                            <label for="file-input">
                                                <a class="avatar-sq extreme-avatar-sq verified-sq upload-sq">
                                                    <img id="preview_img"
                                                         src="{{$user_login -> image != '' ? "upload/image/user_image/".$user_login -> image : 'client_assets/assets/images/avatar/default_avatar.jpg'}}"
                                                         alt="">
                                                </a>
                                            </label>
                                            <input id="file-input" name="image" type="file"
                                                   style="display: none;"
                                                   accept="image/gif,image/jpeg,image/jpg,image/png"
                                                   onchange="loadPreview(this);"/>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">

                                        <div class="div-c">
                                            <div class="divided-column">
                                                <label>First Name</label>
                                                <input type="text" name="name" placeholder=""
                                                       value="{{$user_login -> name}}">
                                            </div>

                                            <div class="divided-column">
                                                <label>Email</label>
                                                <input type="text" name="email" readonly placeholder=""
                                                       value="{{$user_login -> email}}">
                                            </div>

                                            <div class="divided-column">
                                                <label>Vendor Name</label>
                                                <input type="text" placeholder="" readonly
                                                       value="{{$user_login -> name}}">
                                            </div>
                                        </div>

                                        <br>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                                        <hr class="margin-null-sq">
                                        <br>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                        <div class="div-c">
                                            <div class="divided-column">
                                                <label>Address</label>
                                                <input type="text" name="address" placeholder=""
                                                       value="{{$user_login -> address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                        <div class="div-c">
                                            <div class="divided-column">
                                                <label>Phone</label>
                                                <input type="number" name="phone" placeholder=""
                                                       value="{{$user_login -> phone}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                        <div class="div-c inline-3 one-label">
                                            <label>Birthday</label>
                                            <div class="divided-column">
                                                <select class="dropdown">
                                                    <option value="0">01</option>
                                                    <option value="1">02</option>
                                                    <option value="2">03</option>
                                                    <option value="3">04</option>
                                                    <option value="4">05</option>
                                                    <option value="5">06</option>
                                                    <option value="6">07</option>
                                                    <option value="7">08</option>
                                                    <option value="8">09</option>
                                                    <option value="9">10</option>
                                                    <option value="11">...</option>
                                                    <option value="12">31</option>
                                                </select>
                                            </div>

                                            <div class="divided-column">
                                                <select class="dropdown">
                                                    <option value="0">Jan</option>
                                                    <option value="1">Feb</option>
                                                    <option value="2">Mar</option>
                                                    <option value="3">Apr</option>
                                                    <option value="4">May</option>
                                                    <option value="5">Jun</option>
                                                    <option value="6">July</option>
                                                    <option value="7">Aug</option>
                                                    <option value="8">Sep</option>
                                                    <option value="9">Oct</option>
                                                    <option value="10">Nov</option>
                                                    <option value="11">Dec</option>
                                                </select>
                                            </div>

                                            <div class="divided-column">
                                                <select class="dropdown">
                                                    <option value="0">2001</option>
                                                    <option value="1">2002</option>
                                                    <option value="2">2003</option>
                                                    <option value="3">2004</option>
                                                    <option value="4">2005</option>
                                                    <option value="5">2006</option>
                                                    <option value="6">2007</option>
                                                    <option value="7">2008</option>
                                                    <option value="8">2009</option>
                                                    <option value="9">2010</option>
                                                    <option value="11">...</option>
                                                    <option value="12">2031</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                        <div class="div-c">
                                            <div class="divided-column">
                                                <label>Gender</label>
                                                <select name="gender" class="dropdown" required>
                                                    @if($user_login -> gender == 'f')
                                                        <option value="f" selected>Female</option>
                                                        <option value="m">Male</option>
                                                    @elseif($user_login -> gender == 'm')
                                                        <option value="f">Female</option>
                                                        <option value="m" selected>Male</option>
                                                    @else
                                                        <option value="0" selected>Choose your gender</option>
                                                        <option value="f">Female</option>
                                                        <option value="m">Male</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                        <div class="div-c">
                                            <div class="divided-column">
                                                <label>Driver License</label>
                                                <label for="driver_license_input">
                                                    <div class="image-relative article-sample-box" style="width: 400px; height: 250px;">
                                                        <div class="image-wrapper">
                                                            <div class="image-inner">
                                                                <img class="image-sq" id="preview_img_license" src="{{$user_login -> driver_license != 0 ? "upload/image/driver_license_image/".$user_login->driver_license : "client_assets/assets/images/avatar/default_avatar.jpg"}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input id="driver_license_input" name="driver_license" type="file"
                                                       style="display: none;"
                                                       accept="image/gif,image/jpeg,image/jpg,image/png"
                                                       onchange="loadPreviewLicense(this);"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                                        <div class="div-c">
                                            <button class="button-sq" type="submit">
                                                <span>Confirm edit</span>
                                            </button>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script>
        function loadPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function loadPreviewLicense(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_img_license').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

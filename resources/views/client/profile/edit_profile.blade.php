@extends('client.layout.index')

@section('content')
    @if($user_login)
        <div class="ui layout">

            <!-- grid -->
            <div class="ui grid container">

                <div class="row">

                    @include('client.profile.profile_menu')

                    <div
                        class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column"
                        id="about-me">
                        <div class="ui grid">
                            <div class="row">

                                <div
                                    class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">

                                    <div class="white-section dashboard-description typo-section-sq">

                                        <form action="profile/edit/{{$User -> id}}" method="POST"
                                              enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                            <div class="ui grid">
                                                <div class="row">

                                                    <div
                                                        class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">
                                                        <h3>Edit Your Profile</h3>
                                                    </div>
                                                    <div
                                                        class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">

                                                        @if(session('alert'))
                                                            <div class="alert alert-success">
                                                                <span style="color: #FF5C5C;">{{session('alert')}}</span>
                                                            </div>
                                                        @endif

                                                        <div class="div-c">
                                                            <div class="divided-column">
                                                                <label>First Name</label>
                                                                <input type="text" name="name"
                                                                       placeholder="Please enter your name"
                                                                       value="{{$User -> name}}">
                                                            </div>

                                                            <div class="divided-column">
                                                                <label>Vendor Name</label>
                                                                <input type="text" placeholder=""
                                                                       value="{{$User -> name}}">
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
                                                                <label>Location</label>
                                                                <input type="text" name="address"
                                                                       placeholder="Enter your address"
                                                                       value="{{$User -> address}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                                        <div class="div-c">
                                                            <div class="divided-column">
                                                                <label>Phone</label>
                                                                <input type="text"
                                                                       placeholder="Please enter your phone number"
                                                                       name="phone"
                                                                       value="{{$User -> phone}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                                        <div class="div-c">
                                                            <div class="divided-column">
                                                                <label>Gender</label>
                                                                <select name="gender" class="dropdown">
                                                                    @if($User -> gender == 'f')
                                                                        <option value="f" selected>Female</option>
                                                                        <option value="m">Male</option>
                                                                    @else
                                                                        <option value="f">Female</option>
                                                                        <option value="m" selected>Male</option>
                                                                    @endif
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div
                                                        class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                                                        <div class="div-c">
                                                            <button class="button-sq">
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
                    </div>


                </div>
            </div>


        </div>
    @endif
    {{--<div class="ui layout">--}}

    {{--<!-- grid -->--}}
    {{--<div class="ui grid container">--}}

    {{--<div class="row">--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet three wide computer three wide widescreen three wide large screen column">--}}

    {{--<div class="sticky-element sticky-desktop sticky-large-desktop under-ths">--}}

    {{--<div class="dashboard-sticky">--}}
    {{--<div class="dashboard-sticky-inner">--}}

    {{--<div class="dashboard-menu has-submenu">--}}
    {{--<a href="#" class="item">--}}
    {{--<i class="icon icon-side-sticky-menu"></i>--}}
    {{--</a>--}}
    {{--<ul class="submenu">--}}
    {{--<li class="active"><a class="item" href="my_profile.html">My Profile</a></li>--}}
    {{--<li class=""><a class="item" href="my_listings.html">My Listings</a></li>--}}
    {{--<li class=""><a class="item" href="my_settings.html">My Settings</a></li>--}}
    {{--<li class=""><a class="item" href="messages.html">Messages</a></li>--}}
    {{--<li class=""><a class="item" href="orders.html">Trips</a></li>--}}
    {{--<li class=""><a class="item" href="coupons.html">Coupons</a></li>--}}
    {{--<li class=""><a class="item" href="charts.html">Reports</a></li>--}}
    {{--<li class=""><a class="item" href="reviews.html">Reviews</a></li>--}}

    {{--</ul>--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">--}}

    {{--<div class="typo-header-sq">--}}
    {{--<div class="ui grid">--}}
    {{--<div class="row">--}}
    {{--<div class="ui twelve wide computer column">--}}
    {{--<h2>My Profile</h2>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">--}}
    {{--<ul class="inline-menu-sq list-default-sq list-style-inline-sq">--}}
    {{--<li class="active">--}}
    {{--<a href="">Edit Profile</a>--}}
    {{--</li>--}}
    {{--<li class="">--}}
    {{--<a href="">Verification</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}

    {{--<div class="ui twelve wide tablet four wide computer four wide widescreen four wide large screen column">--}}
    {{--<p><strong>85%</strong> Profile Complete</p>--}}
    {{--<div class="basic-progressbar dashboard-progressbar-sq without-percentage-sq">--}}
    {{--<div class="inner" data-percentage="85%" style="width:58%"></div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<form action="profile/{{$User -> id}}" method="POST" enctype="multipart/form-data">--}}
    {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
    {{--<div class="ui grid">--}}
    {{--<div class="row">--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">--}}
    {{--<div class="my-profile-avatar-container">--}}
    {{--<div>--}}
    {{--<div>--}}
    {{--<input type="file" name="image" id="group1" value="1" title="Main List"--}}
    {{--style="display:none;"/>--}}
    {{--<label for="group1">--}}
    {{--<div class="avatar-sq extreme-avatar-sq verified-sq upload-sq">--}}
    {{--@if(empty($User -> image))--}}
    {{--<img--}}
    {{--src="client_assets/assets/images/avatar/default_avatar.jpg"--}}
    {{--alt="">--}}
    {{--@else--}}
    {{--<img--}}
    {{--src="upload/image/user_image/{{$User -> image}}"--}}
    {{--alt="">--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">--}}

    {{--<div class="div-c">--}}
    {{--<div class="divided-column">--}}
    {{--<label>First Name</label>--}}
    {{--<input type="text" name="name" placeholder="Please enter your name"--}}
    {{--value="{{$User -> name}}">--}}
    {{--</div>--}}

    {{--<div class="divided-column">--}}
    {{--<label>Last Name</label>--}}
    {{--<input type="text" placeholder="" value="Cruz">--}}
    {{--</div>--}}

    {{--<div class="divided-column">--}}
    {{--<label>Vendor Name</label>--}}
    {{--<input type="text" placeholder="" value="{{$User -> name}}">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<br>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">--}}
    {{--<hr class="margin-null-sq">--}}
    {{--<br>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">--}}
    {{--<div class="div-c">--}}
    {{--<div class="divided-column">--}}
    {{--<label>Location</label>--}}
    {{--<input type="text" name="address" placeholder="Enter your address"--}}
    {{--value="{{$User -> address}}">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">--}}
    {{--<div class="div-c">--}}
    {{--<div class="divided-column">--}}
    {{--<label>Phone</label>--}}
    {{--<input type="text" placeholder="Please enter your phone number" name="phone"--}}
    {{--value="{{$User -> phone}}">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">--}}
    {{--<div class="div-c inline-3 one-label">--}}
    {{--<label>Birthday</label>--}}
    {{--<div class="divided-column">--}}
    {{--<select class="dropdown" name="day">--}}
    {{--@for($i = 1; $i < 32; $i++)--}}
    {{--@if($i == date('d', strtotime($User->date_of_birth)))--}}
    {{--<option value="{{$i}}" selected>{{$i}}</option>--}}
    {{--@else--}}
    {{--<option value="{{$i}}">{{$i}}</option>--}}
    {{--@endif--}}
    {{--@endfor--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--<div class="divided-column">--}}
    {{--<select class="dropdown" name="month">--}}
    {{--{{$a = 0}}--}}
    {{--@foreach($array_month as $item)--}}
    {{--{{$a++}}--}}
    {{--@if($a == date('m', strtotime($User->date_of_birth)))--}}
    {{--<option value="{{$a}}" selected>{{$item}}</option>--}}
    {{--@else--}}
    {{--<option value="{{$a}}">{{$item}}</option>--}}
    {{--@endif--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--<div class="divided-column">--}}
    {{--<select class="dropdown" name="year">--}}
    {{--@for($i = 2020; $i > 1900; $i--)--}}
    {{--<option value="{{$i}}">{{$i}}</option>--}}
    {{--@endfor--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">--}}
    {{--<div class="div-c">--}}
    {{--<div class="divided-column">--}}
    {{--<label>Gender</label>--}}
    {{--<select name="gender" class="dropdown">--}}
    {{--@if($User -> gender == 'f')--}}
    {{--<option value="f" selected>Female</option>--}}
    {{--<option value="m">Male</option>--}}
    {{--@else--}}
    {{--<option value="f">Female</option>--}}
    {{--<option value="m" selected>Male</option>--}}
    {{--@endif--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">--}}
    {{--<div class="div-c">--}}
    {{--<div class="divided-column">--}}
    {{--<div class="ui accordion">--}}
    {{--<div class="title accordion-trigger">--}}
    {{--Click here to change your password--}}
    {{--</div>--}}
    {{--<div class="content">--}}
    {{--<input type="text" placeholder="Password">--}}
    {{--<input type="text" placeholder="Confirm Password">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div--}}
    {{--class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">--}}
    {{--<div class="div-c">--}}
    {{--<button class="button-sq">--}}
    {{--<span>Confirm edit</span>--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<br>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
@endsection

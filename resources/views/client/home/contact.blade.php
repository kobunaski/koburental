@extends('client.layout.index')

@section('content')

    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container stackable centered">
            <div class="row">
                <div
                    class="ui twelve wide tablet twelve wide computer ten wide widescreen ten wide large screen column property-section-boxed">

                    <br>

                    <div class="white-section shadow-sq">
                        <div class="inner-section">

                            <div class="ui grid">
                                <div class="row">

                                    <!-- Left-->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <!-- Slick aici-->

                                        <div class="property-image-wrapper">
                                            <div class="sq-slick carousel-sq" data-center-mode="true"
                                                 data-center-padding="0" data-show-slides="1" data-scroll-slides="1"
                                                 data-mobile-center-padding="0" data-tablet-arrows="false"
                                                 data-mobile-arrows="false" data-fade="true" data-ease="linear"
                                                 data-speed="500" data-tablet-fade="false" data-tablet-ease="ease"
                                                 data-tablet-speed="300" data-mobile-fade="false"
                                                 data-mobile-ease="ease" data-mobile-speed="300">

                                                <!-- Slide 01-->
                                                <div>
                                                    <div class="caption-content"></div>
                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/cars/photo-1470115636492-6d2b56f9146d.jpeg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- Right -->
                                    <div class="ui twelve wide mobile six wide computer column">
                                        @if(count($errors) > 0)
                                            <div class="div-c">
                                                @foreach($errors -> all() as $err)
                                                    <h2><strong>{{$err}}</strong></h2>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(session('alert'))
                                            <div class="div-c">
                                                <h2><strong>{{session('alert')}}</strong></h2>
                                            </div>
                                        @endif

                                        <form action="contact" method="POST">

                                            <div class="property-checkout-container main-infos">

                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                                <h1 class="title-sq">
                                                    Contact <span style="color: #FF5C5C">Us</span>,
                                                </h1>

                                                <div class="div-c">
                                                    <label>Your Name</label>
                                                    <input name="name" type="text" placeholder="Please input your name"
                                                           @if(isset($user_login))
                                                           value="{{$user_login -> name}}"
                                                        @endif>
                                                </div>

                                                <div class="div-c">
                                                    <label>Your Email</label>
                                                    <input name="email" type="text"
                                                           placeholder="Please input your email"
                                                           @if(isset($user_login))
                                                           value="{{$user_login -> email}}"
                                                        @endif
                                                    >
                                                </div>

                                                <div class="div-c">
                                                    <div class="divided-column">
                                                        <label>Email subject</label>
                                                        <select name="subject" class="dropdown">
                                                            <option value="0">Please choose the subject</option>
                                                            <option value="Vehicle Issues">Vehicle Issues</option>
                                                            <option value="Website Issues">Website Issues</option>
                                                            <option value="Staff Issues">Staff Issues</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="div-c">
                                                    <label>Email content</label>
                                                    <textarea name="content_mail" id="" cols="30" rows="10"
                                                              placeholder="Please input your concern"></textarea>
                                                </div>
                                                <br>
                                                <button type="submit" class="button-sq fullwidth-sq font-weight-bold-sq"
                                                        href="">Submit
                                                </button>
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

        <br>
        <br>

    </div>
@endsection

@extends('client.layout.index')

@section('content')
    <div class="ui layout" id="top">

        <div class="light-section-sq">
            <!-- Hero Full Page -->
            <div class="hero-search-full-page low-sq next-sq">

                <!-- Hero Big - Slick -->
                <div class="sq-slick hero-big slide-up-sq" data-mobile-arrows="false" data-tablet-arrows="false"
                     data-mobile-dots="true" data-fade="true" data-speed="500" data-ease="linear">
                    <!-- .slide-up .fade .top .bottom -->

                    <!--Slide 01-->
                    <div class="">
                        <div class="caption-content">
                            <h1>Your Email has been <span style="color: #FF5C5C">verified</span></h1>
                        </div>
                        <div class="caption-outside">
                            <a class="button-sq link-sq" href="index">
                                <i class="icon big icon-slim-arrow-right" style="color: #FF5C5C"></i>
                                <span style="color: #FF5C5C">Return to homepage</span>
                            </a>
                        </div>

                        <div class="video-wrapper">
                            {{--<iframe src="https://www.youtube.com/embed/BDCU5OFXZ2c?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&start=15&mute=1" allowfullscreen></iframe>--}}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

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
                                                                 src="client_assets/assets/images/cars/property_item_cars_04.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- Right -->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <div class="property-checkout-container main-infos">

                                            <h1 class="title-sq">
                                                About <span style="color: #FF5C5C">KoBu Rentals</span>
                                            </h1>

                                            <p class="description-sq">
                                                In hac habitasse platea dictumst. Integer quis tortor enim. Integer et
                                                elit
                                                nec magna ultricies convallis. In venenatis eu erat et facilisis.
                                                Vestibulum
                                                congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a
                                                libero.
                                                Vivamus vel dapibus sem.
                                            </p>

                                            <p class="description-sq">
                                                In hac habitasse platea dictumst. Integer quis tortor enim. Integer et
                                                elit
                                                nec magna ultricies convallis. In venenatis eu erat et facilisis.
                                                Vestibulum
                                                congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a
                                                libero.
                                                Vivamus vel dapibus sem.
                                            </p>

                                            <p class="description-sq">
                                                In hac habitasse platea dictumst. Integer quis tortor enim. Integer et
                                                elit
                                                nec magna ultricies convallis. In venenatis eu erat et facilisis.
                                                Vestibulum
                                                congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a
                                                libero.
                                                Vivamus vel dapibus sem.
                                            </p>

                                            <p class="description-sq" style="color: #FF5C5C">
                                                Contact us
                                            </p>
                                        </div>


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

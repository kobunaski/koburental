@extends('client.layout.index')

@section('content')
    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container stackable centered">
            <div class="row">
                <h1>Order payment</h1>
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
                                                                 src="upload/image/vehicle_image/{{$Vehicle -> image}}"
                                                                 alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Slide 02-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_01.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 02">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 03-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_02.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 03">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 04-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_03.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 04">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <a class="host-sq" href="vendor_details.html">
                                                <span class="avatar-sq">
                                                    <img src="client_assets/assets/images/avatar/avatar_04.jpg" alt="">
                                                </span>
                                                <p class="host-name-sq">
                                                    Dustin Porter
                                                </p>

                                            </a>
                                        </div>

                                        <h1 class="title-sq">
                                            {{$Vehicle -> name}}
                                        </h1>

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <div class="rating-sq" style="background: #FF5C5C">
                                                    <i class="icon icon-heart"></i>
                                                    @if($average_rating == 0)
                                                        No rating
                                                    @else
                                                        {{$average_rating}}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-ac"></i>
                                                @if($VehicleDetail -> air_con == 1)
                                                    A/C
                                                @else
                                                    No A/C
                                                @endif
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-gearbox"></i>
                                                @switch($VehicleDetail -> gearbox)
                                                    @case (1)
                                                    A
                                                    @break
                                                    @case (2)
                                                    A/M
                                                    @break
                                                    @case (3)
                                                    DCT
                                                    @break
                                                    @case (4)
                                                    M
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-user-circle"></i> x {{$VehicleDetail->seat}}
                                            </div>
                                        </div>

                                        <p class="description-sq">
                                            In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit
                                            nec magna ultricies convallis. In venenatis eu erat et facilisis. Vestibulum
                                            congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a libero.
                                            Vivamus vel dapibus sem.
                                        </p>

                                    </div>

                                    <!-- Right -->
                                    <form action="">
                                        <div class="ui twelve wide mobile six wide computer column">
                                            <div class="property-checkout-container main-infos">

                                                <div class="div-c">
                                                    <label>Pick up location</label>
                                                    <input type="text" placeholder=""
                                                           value="{{$PickupLocation -> name}}" readonly>
                                                </div>

                                                <div class="div-c inline-2 inline-check-in">

                                                    <div class="divided-column calendar-sq" id="rangestart">
                                                        <label class="placeholder">Check in</label>

                                                        <div class="relative-sq">
                                                            <input type="text" class="filter" readonly
                                                                   value="{{$Booking -> pickup_date}}"
                                                                   placeholder="date">

                                                            <i class="icon icon-little-arrow filters-arrow"></i>
                                                        </div>

                                                    </div>

                                                    <div class="divided-column calendar-sq" id="rangeend">

                                                        <label class="placeholder">Check Out</label>

                                                        <input type="text" class="filter" readonly
                                                               value="{{$Booking -> return_date}}"
                                                               placeholder="date">

                                                    </div>
                                                </div>

                                                <div class="div-c extras-sq">
                                                    <label class="placeholder">Payment type</label>

                                                    <div class="divided-column">
                                                        <input type="radio" name="payment-type" id="paypal"
                                                               value="paypal" required>
                                                        <label for="paypal">Paypal</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="radio" name="payment-type" id="visa" value="visa">
                                                        <label for="visa">Visa</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="radio" name="payment-type" id="momo" value="momo">
                                                        <label for="momo">Momo</label>
                                                    </div>
                                                </div>


                                                <div class="div-c total-sq">
                                                    <div class="divided-column">
                                                        <label class="placeholder">Total</label>
                                                        <span class="value-sq">${{$total_price}}</span>

                                                    </div>
                                                </div>

                                                <button type="submit" class="button-sq fullwidth-sq font-weight-bold-sq"
                                                        href="">Proceed to payment
                                                </button>
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
@endsection

@section('script')
    <script>
        $('#rangestart').calendar({
            type: 'date',
            endCalendar: $('#rangeend'),
            //inline: true,
            className: {
                prevIcon: "icon icon-arrow-left-122",
                nextIcon: "icon icon-arrow-right-122"
            }
        });

        $('#rangeend').calendar({
            type: 'date',
            startCalendar: $('#rangestart'),
            //inline: true,
            className: {
                prevIcon: "icon icon-arrow-left-122",
                nextIcon: "icon icon-arrow-right-122"
            }
        });
    </script>
@endsection

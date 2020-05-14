@extends('client/layout/index')

@section('content')
    <div class="ui layout" id="top">

        <div class="light-section-sq">
            <!-- Hero Full Page -->
            <div class="hero-search-full-page low-sq next-sq">
                <!-- Hero Search Vertical Default -->
                <div class="h-search-v narrow-sq animate-sq shadow-sq">
                    <form action="vehicle/" method="GET" class="hero-search-form" autocomplete="off">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="search-item">
                            <i class="icon icon-pickup-location"></i>
                            <div class="fltp">
                                <select name="pickup_location" size="13" class="dropdown" required>
                                    <option value="0" selected>&nbsp;</option>
                                    @foreach($PickupLocation as $item)
                                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                                <label class="placeholder">Pickup Location</label>
                            </div>
                        </div>

                        <div class="search-item">
                            <i class="icon icon-return-location"></i>
                            <div class="fltp">
                                <select name="return_location" size="13" class="dropdown" required>
                                    <option value="0" selected>&nbsp;</option>
                                    @foreach($PickupLocation as $item)
                                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                                <label class="placeholder">Return Location</label>
                            </div>
                        </div>

                        {{--<div class="search-item">--}}
                        {{--<div class="checkbox-wrapper">--}}
                        {{--<input type="checkbox" id="checkbox11">--}}
                        {{--<label for="checkbox11">Return car to pickup location</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="search-item">
                            <i class="icon icon-pickup-date"></i>
                            <div class="fltp calendar-sq" id="rangestart">
                                <input type="text" name="pickup_date" class="filter" value="" placeholder="enter date">
                                <label class="placeholder" data-big-placeholder="Pickup date"
                                       data-little-placeholder="Pickup date"></label>
                            </div>
                        </div>

                        <div class="search-item">
                            <i class="icon icon-return-date"></i>
                            <div class="fltp calendar-sq" id="rangeend">
                                <input type="text" name="return_date" class="filter" value="" placeholder="enter date">
                                <label class="placeholder" data-big-placeholder="Return date"
                                       data-little-placeholder="Return date"></label>
                            </div>
                        </div>

                        <div class="search-item">

                            <button type="submit" class="button-sq">
                                <i class="icon icon-search"></i>
                                <span>Find a car</span>
                            </button>

                        </div>

                    </form>
                </div>

                <!-- Hero Big - Slick -->
                <div class="sq-slick hero-big slide-up-sq left-sq" data-mobile-arrows="false" data-tablet-arrows="false"
                     data-mobile-dots="true" data-fade="true" data-speed="500" data-ease="linear">
                    <!-- .slide-up .fade .top .bottom -->

                    <!--Slide 01-->
                    <div class="">
                        <div class="caption-content">
                            <h1>Easy and fast <br>Rent a car</h1>
                            <p>In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit nec magna
                                ultricies convallis. In venenatis eu erat et facilisis.</p>
                        </div>
                        <div class="caption-outside">
                            <a class="button-sq link-sq" href="vehicle">
                                <i class="icon big icon-slim-arrow-right"></i>
                                <span>View cars</span>
                            </a>
                        </div>

                        {{--<div class="video-wrapper">--}}
                        {{--<iframe src="https://www.youtube.com/embed/BDCU5OFXZ2c?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&start=15&mute=1" allowfullscreen></iframe>--}}
                        {{--</div>--}}

                        <div class="image-wrapper">
                            <div class="image-inner">
                                <img class="image-sq" src="client_assets/assets/images/hero/hero_big_04.jpeg" alt="">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="ui grid container">
                <div class="row">
                    <div class="ui column">
                        <div class="typo-section-sq top-default bottom-default">
                            <h2 class="heading-inline text-align-center-sq">
                                <i class="icon icon-slim-arrow-left sq-prev-button"></i>
                                <span>Our Partners</span>
                                <i class="icon icon-slim-arrow-right sq-next-button"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui grid container typo-section-sq bottom-default">
                <div class="row">
                    <div class="sq-slick article-sq-slick" data-arrows="false" data-center-mode="true"
                         data-center-padding="0px" data-desktop-center-padding="0px" data-show-slides="5"
                         data-scroll-slides="3" data-tablet-show-slides="2" data-tablet-scroll-slides="2"
                         data-mobile-show-slides="3" data-mobile-scroll-slides="3" data-tablet-center-padding="0px"
                         data-mobile-center-padding="50px">

                        <!-- Slide 01-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_002.jpg" alt="">
                            </div>
                        </div>

                        <!-- Slide 02-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_001.jpg" alt="">
                            </div>
                        </div>

                        <!-- Slide 03-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_002.jpg" alt="">
                            </div>
                        </div>

                        <!-- Slide 04-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_001.jpg" alt="">
                            </div>
                        </div>

                        <!-- Slide 05-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_002.jpg" alt="">
                            </div>
                        </div>

                        <!-- Slide 06-->
                        <div>
                            <div class="caption-content">
                                <img src="client_assets/assets/images/partner_001.jpg" alt="">
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>

        <div class="typo-section-sq bottom-default">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui twelve wide mobile twelve wide tablet twelve wide computer column">
                        <div class="typo-section-header-sq">
                            <h2 class="text-align-center-sq">Popular Cars</h2>
                        </div>
                    </div>

                    @foreach($Vehicle as $item)
                        <div class="ui twelve wide mobile six wide tablet four wide computer column">
                            <div class="property-item caption-sq shadow-sq small-sq">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">{{$item -> daily_price}} &euro; <span>/ day</span></div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="vehicle/detail/{{$item -> id}}">
                                        <div class="image-wrapper">
										<span class="image-inner">
											<img src="upload/image/vehicle_image/{{$item -> image}}" alt=""
                                                 class="">
										</span>
                                        </div>
                                    </a>

                                    <div class="main-details">
                                        <div class="title-row">
                                            <a href="vehicle/detail/{{$item -> id}}"
                                               class="title-sq">{{$item -> name}}</a>
                                        </div>

                                        <div class="icons-row">
                                            <div class="icons-column" style="background: #FF5C5C">
                                                <i class="icon icon-heart"></i>
                                                <?
                                                $rating = array();
                                                $average_rate = 0;
                                                ?>
                                                @foreach($Feedback as $item2)
                                                    @if($item2 -> id_vehicle == $item -> id)
                                                        <?
                                                        $rating[] = $item2->rating;
                                                        $average_rate = array_sum($rating) / count($rating);
                                                        ?>
                                                    @endif
                                                @endforeach
                                                @if($average_rate != 0)
                                                    {{$average_rate}}
                                                @else
                                                    No rating
                                                @endif
                                            </div>
                                            @foreach($VehicleDetail as $item2)
                                                @if($item2 -> id_vehicle == $item -> id)
                                                    <div class="icons-column">
                                                        <i class="icon icon-ac"></i>
                                                        @if($item2 -> air_con == 1)
                                                            A/C
                                                        @else
                                                            No A/C
                                                        @endif
                                                    </div>
                                                    <div class="icons-column">
                                                        <i class="icon icon-gearbox"></i>
                                                        @switch($item2 -> gearbox)
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
                                                        <i class="icon icon-user-circle"></i> x {{$item2->seat}}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="ui twelve wide mobile twelve wide tablet twelve wide computer column">
                        <div class="typo-section-sq thick-sq">
                            <a class="more-trigger" data-more="See All" href="vehicle/">
                                <i class="icon icon-arrow-down-122"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(Session('payment-success'))
        <!-- Modal trigger -->
        <a class="button-sq see-through-sq small-sq modal-ui-trigger" data-trigger-for="payment-success" id="payment-success"></a>

        <!-- Modal -->
        <div class="ui modal" data-for="payment-success">

            <i class="icon icon-close close-modal"></i>

            <div class="header center">
                <h4>Successful payment</h4>
            </div>

            <div class="content">
                <p>Your payment has been accepted. Thank you for your trust in our website</p>
            </div>
        </div>
    @endif
@endsection
@section('script')
@endsection

@extends('client.layout.index')
@section('content')
    <header class="header-section mhs header-sticky header-isnt-tablet header-isnt-mobile">
        <div class="header-content">
            <div class="ui container grid">
                <div class="header-item header-left">
                </div>

                <div class="header-item header-center ">
                </div>

                <div class="header-item header-right flex-align-left flex-grow-true">

                    <!-- Mega Menu-->

                    <form action="vehicle/search" method="GET">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="filter" value="1"/>
                        <div
                            class="item menu-default burger-mobile-modal burger-tablet-modal dropdown-fullwidth flex-grow-true"
                            data-burger="menu02">

                            <a href="" class="modal-trigger close-sq hamburger hamburger-spin item"
                               data-trigger-for="menu02">
                            <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                            </span>
                            </a>

                            <ul class="main-menu">

                                {{--<li>--}}
                                {{--<div class="fltp item">--}}
                                {{--<i class="icon icon-pickup-location"></i>--}}
                                {{--<input type="text"--}}
                                {{--value=@foreach($PickupLocation as $item) @if($item -> id == $id_pickup_location) "{{$item -> name}}" @endif @endforeach>--}}
                                {{--<label class="placeholder" data-big-placeholder="Pickup Location"--}}
                                {{--data-little-placeholder="Pickup Location"></label>--}}
                                {{--</div>--}}
                                {{--</li>--}}

                                {{--<li>--}}
                                {{--<div class="fltp item">--}}
                                {{--<i class="icon icon-return-location"></i>--}}
                                {{--<input type="text" value="">--}}
                                {{--<label class="placeholder" data-big-placeholder="Return Location"--}}
                                {{--data-little-placeholder="Return Location"></label>--}}
                                {{--</div>--}}
                                {{--</li>--}}

                                <li>

                                    <div class="fltp item" id="rangestart">
                                        <input type="text" name="pickup_date" class="filter" value="{{$pickup_date}}"
                                               placeholder="Enter Date">
                                        <label class="placeholder" data-big-placeholder="Check In Date"
                                               data-little-placeholder="Check In"></label>
                                    </div>

                                    <i class="icon icon-little-arrow item hidden-mobile hidden-tablet"></i>

                                    <div class="fltp item" id="rangeend">
                                        <input type="text" name="return_date" class="filter" value="{{$return_date}}"
                                               placeholder="Enter Date">
                                        <label class="placeholder" data-big-placeholder="Check Out Date"
                                               data-little-placeholder="Check Out"></label>
                                    </div>

                                </li>

                                <li class="has-submenu has-megamenu open-inside-modal filters-dropdown overlay-dropdown">

                                    <a href="#" class="item hidden-tablet hidden-mobile">
                                        <i class="icon icon-filter"></i>
                                        <span class="hidden-tablet">Filters</span>
                                    </a>

                                    <ul class="submenu megamenu">
                                        <li class="item">

                                            <div class="content">

                                                <div class="price-range-slider mobile-big">
                                                    <a href="#" class="price-range-trigger"
                                                       id="price-range-trigger"></a>

                                                    <span
                                                        class="price-range-placeholder hidden-desktop hidden-large-desktop">
												   <span>Price </span><span>Range</span>
											   </span>

                                                    <div id="price-range-slider" class="price-range-slider-base"></div>
                                                </div>

                                                <div class="div-c inline-2">
                                                    <div class="divided-column">
                                                        <label>Pickup Location</label>
                                                        <select name="pickup_location" class="dropdown item" required>
                                                            <option value="0">Choose location</option>
                                                            @foreach($PickupLocation as $item)
                                                                @if(isset($id_pickup_location))
                                                                    @if($id_pickup_location == $item -> id)
                                                                        <option
                                                                            value="{{$item -> id}}"
                                                                            selected>{{$item -> name}}</option>
                                                                    @else
                                                                        <option
                                                                            value="{{$item -> id}}">{{$item -> name}}</option>
                                                                    @endif
                                                                @else
                                                                    <option
                                                                        value="{{$item -> id}}">{{$item -> name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="divided-column">
                                                        <label>Return Location</label>
                                                        <select name="return_location" class="dropdown item" required>
                                                            <option value="0" selected>Return location</option>
                                                            @foreach($PickupLocation as $item)
                                                                <option
                                                                    value="{{$item -> id}}">{{$item -> name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="div-c inline-2">
                                                    <div class="divided-column">
                                                        <label>Seats</label>
                                                        <select name="seat" class="dropdown item">
                                                            <option value="0">Choose</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                    </div>

                                                    <div class="divided-column">
                                                        <label>Fuel</label>
                                                        <select name="fuel" class="dropdown item">
                                                            <option value="0">Choose</option>
                                                            @if($fuel == 1)
                                                                <option value="1" selected>Gasoline</option>
                                                                <option value="2">Diesel</option>
                                                            @elseif($fuel == 2)
                                                                <option value="1">Gasoline</option>
                                                                <option value="2" selected>Diesel</option>
                                                            @else
                                                                <option value="1">Gasoline</option>
                                                                <option value="2">Diesel</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <hr>

                                                {{--<div class="div-c inline-3">--}}
                                                {{--<div class="divided-column">--}}
                                                {{--<label>Instant Booking</label>--}}
                                                {{--<input type="checkbox" id="extra01">--}}
                                                {{--<label for="extra01">Instant Booking</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="divided-column">--}}
                                                {{--<label>Super Host</label>--}}
                                                {{--<input type="checkbox" id="extra02">--}}
                                                {{--<label for="extra02">Super Host</label>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}

                                                <hr>

                                                <div class="div-c inline-3 one-label">
                                                    <label>Car's features</label>
                                                    <div class="divided-column">
                                                        <input type="checkbox" value="1"
                                                               @if(isset($air_con) == 1)
                                                               checked
                                                               @endif
                                                               name="air_con" id="checkbox1">
                                                        <label for="checkbox1">A/C</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="checkbox" value="1"
                                                               @if(isset($bluetooth) == 1)
                                                               checked
                                                               @endif
                                                               name="bluetooth"
                                                               id="checkbox2">
                                                        <label for="checkbox2">Bluetooth</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="checkbox" id="checkbox3">
                                                        <label for="checkbox3">Heated Seats</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="checkbox" value="1"
                                                               @if(isset($gearbox) == 1)
                                                               checked
                                                               @endif
                                                               name="gearbox" id="checkbox4">
                                                        <label for="checkbox4">Automatic gearbox</label>
                                                    </div>

                                                    <div class="divided-column">
                                                        <input type="checkbox" value="1" name="4x4" id="checkbox5">
                                                        <label for="checkbox5">4 x 4</label>
                                                    </div>


                                                </div>

                                                <hr>

                                                <div class="div-c inline-3 one-label">
                                                    <label>Car Rules</label>
                                                    <div class="divided-column">
                                                        <input type="checkbox" id="rules01">
                                                        <label for="rules01">Pets allowed</label>
                                                    </div>
                                                    <div class="divided-column">
                                                        <input type="checkbox" id="rules02">
                                                        <label for="rules02">Smoking allowed</label>
                                                    </div>
                                                    <div class="divided-column">
                                                        <input type="checkbox" id="rules03">
                                                        <label for="rules03">Suitable for trips</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="footer">
                                                <div class="div-c inline-2">
                                                    <div class="divided-column">
                                                        <div class="applied-filters">
                                                            <div class="filters-icon-container">
                                                                <i class="icon icon-filter"></i>
                                                            </div>
                                                            <a class="remove-all" href="vehicle">
                                                                Remove All<i class="icon icon-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="divided-column">
                                                        <button type="submit"
                                                                class="float-right-sq button-sq modal-button font-weight-bold-sq">
                                                            Apply
                                                        </button>

                                                        <a class="float-right-sq button-sq cancel-sq hidden-tablet hidden-mobile"
                                                           href="">Cancel</a>

                                                    </div>
                                                </div>

                                            </div>

                                        </li>
                                    </ul>


                                </li>

                            </ul>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </header>

    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container centered">


            <div class="switch-view-controller hidden-desktop hidden-large-desktop">

                <a href="" class="modal-trigger item hidden-desktop hidden-large-desktop" data-trigger-for="menu02">
                    <i class="icon icon-filter"></i>
                    <span>Filters</span>
                </a>
            </div>
            <?
            $count = 0;
            ?>
            @foreach($Vehicle as $item)
                @if($item -> id_pickup_location == $id_pickup_location)
                    @foreach($array_different as $available_vehicle)
                        @if($item -> id == $available_vehicle)
                            <?
                            $count++;
                            ?>
                            <div class="ui twelve wide mobile six wide tablet four wide computer column">
                                <div class="property-item caption-sq shadow-sq small-sq">
                                    <div class="property-item-inner">

                                        <div class="price-tag-sq">{{$item -> daily_price}} &dollar; <span>/ Day</span>
                                        </div>
                                        <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                            <i class="icon icon-add-wishlist"></i>
                                        </a>

                                        <a class="image-sq" href="vehicle/detail/{{$item -> id}}">
                                            <div class="image-wrapper">
									<span class="image-inner">
										<img src="upload/image/vehicle_image/{{$item -> image}}" alt="" class="">
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
                        @endif
                    @endforeach
                @elseif ($id_pickup_location == 0)
                    @foreach($array_different as $available_vehicle)
                        @if($item -> id == $available_vehicle)
                            <?
                            $count++;
                            ?>
                            <div class="ui twelve wide mobile six wide tablet four wide computer column">
                                <div class="property-item caption-sq shadow-sq small-sq">
                                    <div class="property-item-inner">

                                        <div class="price-tag-sq">{{$item -> daily_price}} &dollar; <span>/ Day</span>
                                        </div>
                                        <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                            <i class="icon icon-add-wishlist"></i>
                                        </a>

                                        <a class="image-sq" href="vehicle/detail/{{$item -> id}}">
                                            <div class="image-wrapper">
									<span class="image-inner">
										<img src="upload/image/vehicle_image/{{$item -> image}}" alt="" class="">
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
                        @endif
                    @endforeach
                @endif
            @endforeach
            <div class="ui twelve wide mobile twelve wide tablet twelve wide computer column">
                <div class="typo-section-sq thick-sq">
                    {{--@if($count > 6)--}}
                    {{--{{$Vehicle->links()}}--}}
                    {{--@endif--}}
                </div>
            </div>


        </div>
        <!--end ui container-->

    </div>

    <!-- Wishlist -->
    <div class="ui modal small" data-for="wishlist">
        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            <h4>Wishlist</h4>
        </div>

        <div class="content">
            <p>Mauris malesuada leo libero, vitae tempor ante sagittis vitae. Suspendisse consectetur facilisis
                enim.</p>
            <br>
            <input type="checkbox" id="c01">
            <label for="c01">Beautiful Cars</label>
            <input type="checkbox" id="c02">
            <label for="c02">For Summer</label>
            <input type="checkbox" id="c03">
            <label for="c03">Dream Cars</label>
        </div>

        <div class="actions">
            <div class="div-c inline-2">
                <div class="divided-column">
                    <div class="button-sq cancel-sq fullwidth-sq">Cancel</div>
                </div>

                <div class="divided-column">
                    <div class="button-sq fullwidth-sq">OK</div>
                </div>
            </div>
        </div>
    </div>
@endsection

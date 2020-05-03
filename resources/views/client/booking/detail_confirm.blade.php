@extends('client.layout.index')

@section('content')
    @switch($step)
        @case(0)
        <div class="add-listing-content">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui six wide computer twelve wide tablet column">
                        <h3 class="complete-sq title-sq">Car Details: <span
                                style="color: #FF5C5C;">{{$Vehicle -> name}}</span></h3>

                        <p class="description-sq">Please confirm the following information about the car that your want
                            to
                            reserve. </p>

                        <div class="div-c">
                            <div class="divided-column">
                                <label>Car Brand</label>
                                <input type="text" readonly value="{{$Manufacture -> name}}">
                            </div>
                        </div>

                        <div class="div-c">
                            <div class="divided-column">
                                <label>Car Type</label>
                                <input type="text" readonly value="{{$VehicleType -> name}}">
                            </div>
                        </div>

                        <hr>

                        <div class="div-c">
                            <div class="divided-column">
                                <label>Number of Seats</label>
                                <input type="text" readonly value="{{$VehicleDetail -> seat}}">
                            </div>

                            <div class="divided-column">
                                <label>Gearbox</label>
                                <input type="text" readonly
                                       @switch($VehicleDetail -> gearbox)
                                       @case(1)
                                       value="Traditional Automatic Transmission"
                                       @break
                                       @case(2)
                                       value="Automated-Manual Transmission"
                                       @break
                                       @case(3)
                                       value="Dual-Clutch Transmission"
                                       @break
                                       @case(4)
                                       value="Manual Transmission"
                                    @break
                                    @endswitch
                                >
                            </div>

                            <div class="divided-column">
                                <label>Fuel</label>
                                <input type="text" readonly
                                       @if($VehicleDetail -> fuel == 1)
                                       value="Gasoline">
                                @else
                                    value="Diesel">
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="ui six wide computer twelve wide tablet column">
                        <div class="image-full-height">
                            <div class="image-wrapper">
                                <div class="image-inner">
                                    <img src="upload/image/vehicle_image/{{$Vehicle -> image}}" alt="" class="image-sq">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @break
        @case(2)
        <div class="add-listing-content">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui six wide computer twelve wide tablet column">
                        <h3 class="complete-sq title-sq">Amenities: <span
                                style="color: #FF5C5C;">{{$Vehicle -> name}}</span></h3>

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            faucibus magna vel ex semper, in pharetra justo pulvinar.</p>

                        <div class="div-c inline-3">

                            <div class="divided-column">
                                <input type="checkbox"
                                       id="checkbox4" {{$VehicleDetail -> air_con == 1 ? "checked" : ""}}>
                                <label for="checkbox4">A/C</label>
                            </div>

                            <div class="divided-column">
                                <input type="checkbox"
                                       id="checkbox5" {{$VehicleDetail -> bluetooth == 1 ? "checked" : ""}}>
                                <label for="checkbox5">Bluetooth</label>
                            </div>

                            <div class="divided-column">
                                <input type="checkbox" id="checkbox6">
                                <label for="checkbox6">Heated Seats</label>
                            </div>

                            <div class="divided-column">
                                <input type="checkbox" id="checkbox7">
                                <label for="checkbox7">Child Seat</label>
                            </div>

                            <div class="divided-column">
                                <input type="checkbox" id="checkbox8">
                                <label for="checkbox8">Displays</label>
                            </div>

                            <div class="divided-column">
                                <input type="checkbox" id="checkbox8">
                                <label for="checkbox8">HiFi</label>
                            </div>

                        </div>

                    </div>

                    <div class="ui six wide computer twelve wide tablet column">
                        <div class="image-full-height">
                            <div class="image-wrapper">
                                <div class="image-inner">
                                    <img src="client_assets/assets/images/host/host_08.jpg" alt="" class="image-sq">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @break
        @case(3)
        <div class="add-listing-content">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui six wide computer twelve wide tablet column">
                        <h3 class="complete-sq title-sq">Renting Period:</h3>

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                        <div class="div-c inline-2 inline-check-in">

                            <div class="divided-column calendar-sq" id="rangestart">
                                <label class="placeholder">Check in</label>

                                <div class="relative-sq">
                                    <input type="text" class="filter"
                                           value="{{\Illuminate\Support\Facades\Session::get('pickup_date')}}" required
                                           placeholder="date">

                                    <i class="icon icon-little-arrow filters-arrow"></i>
                                </div>

                            </div>

                            <div class="divided-column calendar-sq" id="rangeend">

                                <label class="placeholder">Check Out</label>

                                <input type="text" class="filter"
                                       value="{{\Illuminate\Support\Facades\Session::get('return_date')}}" required
                                       placeholder="date">

                            </div>
                        </div>

                        <div class="div-c">
                            <div class="div-c">
                                <label>Rental period</label>
                                <input type="text" value="{{$days}} days" readonly>
                            </div>
                        </div>


                    </div>

                    <div class="ui six wide computer twelve wide tablet column">
                        <div class="image-full-height">
                            <div class="image-wrapper">
                                <div class="image-inner">
                                    <img src="client_assets/assets/images/host/host_11.jpg" alt="" class="image-sq">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @break
        @case(4)
        <div class="add-listing-content">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui six wide computer twelve wide tablet column">
                        <h3 class="complete-sq title-sq">Prices</h3>

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                        <div class="div-c one-label">
                            <label>Base Price</label>

                            <div class="divided-column">
                                <div class="base-price-wrapper">

                                    <select name="dropdown" class="dropdown post-curency">
                                        <option value="0">USD</option>
                                        <option value="1">EUR</option>
                                        <option value="2">GBP</option>
                                        <option value="2">RON</option>
                                    </select>

                                    <input type="text" readonly class="base-price-input"
                                           value="${{$Vehicle -> daily_price}}" required="" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="div-c">
                            <div class="divided-column">
                                <label>Days to rent: </label>
                                <input type="text" readonly value="{{$days}} days">
                            </div>
                        </div>

                        <div class="div-c">
                            <div class="divided-column">
                                <label>Total Fee</label>
                                <div class="info-wrapper inside-sq ">
                                    <input type="text" readonly
                                           value="{{number_format($Vehicle -> daily_price * $days, 2)}}">
                                    <a class="extra-info">USD <i class="icon icon icon-info-full"></i></a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="div-c inline-2">
                            <div class="divided-column">
                                <label>Monthly Discount</label>
                                <select class="dropdown">
                                    <option value="0">7%</option>
                                    <option value="1">10%</option>
                                    <option value="2">13%</option>
                                </select>
                            </div>

                            <div class="divided-column">
                                <label>Weekly Discount</label>
                                <select class="dropdown">
                                    <option value="0">4%</option>
                                    <option value="1">8%</option>
                                    <option value="2">12%</option>
                                    <option value="2">16%</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="ui six wide computer twelve wide tablet column">
                        <div class="image-full-height">
                            <div class="image-wrapper">
                                <div class="image-inner">
                                    <img src="client_assets/assets/images/host/host_10.jpg" alt="" class="image-sq">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @break
        @case(5)
        <div class="add-listing-content">
            <form action="vehicle/booking/{{$Vehicle -> id}}" method="POST" enctype="multipart/form-data">
                <div class="ui grid container">
                    <div class="row">
                        <div
                            class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                            <h3 class="complete-sq title-sq">Final confirmation</h3>
                        </div>

                        <div
                            class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                            <br>

                            <h4>User information</h4>

                            <p class="description-sq">Please complete the following fields to confirm your
                                reservation</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="ui eight wide computer twelve wide tablet column">
                            <div class="div-c one-label">
                                <div class="divided-column">
                                    <label>Full name</label>
                                    <input type="text" readonly
                                           value="{{$user_login -> name}}" required="" placeholder="">
                                </div>
                            </div>

                            <div class="div-c inline-2">
                                <div class="divided-column">
                                    <label>Email: </label>
                                    <input type="text" readonly value="{{$user_login -> email}}">
                                </div>
                                <div class="divided-column">
                                    <label>Phone number: </label>
                                    <input type="number" name="phone" value="{{$user_login -> phone}}" required>
                                </div>
                            </div>

                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Address</label>
                                    <div class="info-wrapper inside-sq ">
                                        <input type="text" name="address"
                                               value="{{$user_login -> address}}" required>
                                    </div>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div
                            class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                            <h4>Driver license</h4>

                            <p class="description-sq">Please upload your driver license for security reasons. Press
                                confirm to complete the
                                reservation</p>

                        </div>
                    </div>

                    <div class="row photo-upload">

                        <div class="ui three wide computer six wide tablet twelve wide mobile column">
                            <div class="photo-upload-item">
                                <div class="image-wrapper">
                                    <img class="image-sq" id="preview_img"
                                         src="{{$user_login -> driver_license != 0 ? "upload/image/driver_license_image/".$user_login -> driver_license : "client_assets/assets/images/host/host_01.jpg"}}" alt="">
                                </div>

                                <textarea cols="30" rows="2" disabled=""
                                          placeholder="Driver license preview"></textarea>

                            </div>
                        </div>

                        @if($user_login -> driver_license == 0)
                            <div class="ui three wide computer six wide tablet twelve wide mobile column">
                                <div class="photo-upload-item" id="OpenImgUpload">
                                    <label for="file-input">
                                        <a class="add-photo">
                                            <i class="icon icon-add-wishlist"></i>
                                            Add Photo
                                        </a>
                                    </label>
                                    <input id="file-input" required name="driver_license" type="file"
                                           style="display: none;"
                                           accept="image/gif,image/jpeg,image/jpg,image/png"
                                           onchange="loadPreview(this);"/>
                                </div>
                            </div>
                        @endif
                    </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <input type="hidden" name="id_vehicle" value="{{$Vehicle -> id}}">
                    <input type="hidden" name="id_pickup_location" value="{{$Vehicle -> id_pickup_location}}">
                    <input type="hidden" name="pickup_date"
                           value="{{\Illuminate\Support\Facades\Session::get('pickup_date')}}">
                    <input type="hidden" name="return_date"
                           value="{{\Illuminate\Support\Facades\Session::get('return_date')}}">
                    <br>

                    <button type="submit"
                            class="button-sq font-weight-bold-sq">Confirm Car Reservation
                    </button>
                </div>
            </form>
        </div>
        @break
    @endswitch
@endsection

@section('footer')
    <div class="add-listing-footer">
        <div class="ui grid container">
            <div class="row">
                <div class="ui column">
                    <a class="button-sq link-sq" href="javascript:history.back()">
                        <i class="icon icon-slim-arrow-left"></i><span>back</span>
                    </a>
                    @switch($step)
                        @case(0)
                        <div class="basic-progressbar dashboard-progressbar-sq">
                            <div class="inner" data-percentage="5%" style="width:5%"></div>
                        </div>

                        <form action="vehicle/booking/{{$Vehicle -> id}}" method="get">
                            <input type="hidden" name="step" value="2">


                            <button class="button-sq next-sq" href="add_listing_amenities.html"><i
                                    class="icon icon-slim-arrow-right"></i></button>
                        </form>
                        @break
                        @case(2)
                        <div class="basic-progressbar dashboard-progressbar-sq">
                            <div class="inner" data-percentage="38%" style="width:38%"></div>
                        </div>

                        <form action="vehicle/booking/{{$Vehicle -> id}}" method="get">
                            <input type="hidden" name="step" value="3">


                            <button class="button-sq next-sq" href="add_listing_amenities.html"><i
                                    class="icon icon-slim-arrow-right"></i></button>
                        </form>
                        @break
                        @case(3)
                        <div class="basic-progressbar dashboard-progressbar-sq">
                            <div class="inner" data-percentage="52%" style="width:52%"></div>
                        </div>

                        <form action="vehicle/booking/{{$Vehicle -> id}}" method="get">
                            <input type="hidden" name="step" value="4">

                            <button class="button-sq next-sq" href="add_listing_amenities.html"><i
                                    class="icon icon-slim-arrow-right"></i></button>
                        </form>
                        @break
                        @case(4)
                        <div class="basic-progressbar dashboard-progressbar-sq">
                            <div class="inner" data-percentage="76%" style="width:76%"></div>
                        </div>

                        <form action="vehicle/booking/{{$Vehicle -> id}}" method="get">
                            <input type="hidden" name="step" value="5">


                            <button class="button-sq next-sq" href="add_listing_amenities.html"><i
                                    class="icon icon-slim-arrow-right"></i></button>
                        </form>
                        @break
                        @case(5)
                        <div class="basic-progressbar dashboard-progressbar-sq">
                            <div class="inner" data-percentage="95%" style="width:95%"></div>
                        </div>
                        @break
                    @endswitch
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
    <script>
        function loadPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_img').attr('src', e.target.result);
                    // $('#preview_img_div').removeAttr('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

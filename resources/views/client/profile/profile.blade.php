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

                                        <div class="ui grid">
                                            <div class="row">

                                                <div
                                                    class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">
                                                    <h3>About Me</h3>
                                                </div>

                                                <div
                                                    class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                                                    <h5>Description</h5>

                                                    <p>Somos una familia multicultural lo cual nos enorgullece y nos
                                                        enriquece. Nos gusta mucho viajar, hemos estado en Alemania,
                                                        España,
                                                        Italia, Francia, Luxemburgo, Bélgica, Perú, Bolivia, Argentina,
                                                        México y de cada lugar hemos traído bellas memorias y
                                                        aprendizajes.
                                                        <br><br>

                                                        En cuanto a los sabores del mundo, nos encanta la comida árabe,
                                                        alemana, española y por supuesto la comida chilena. Entre la
                                                        música
                                                        que nos une están la salsa, la bachata, el tango, el folklore
                                                        latinoamericano y el rock.
                                                    </p>
                                                </div>

                                                <div
                                                    class="ui twelve wide tablet four wide computer four wide widescreen four wide large screen column">
                                                    <h5>Location</h5>

                                                    <div class="location-sq">
                                                        <i class="icon icon-location-pin-2"></i>
                                                        @if(isset($user_login -> address))
                                                            {{$user_login -> address}}
                                                        @else
                                                            Not set
                                                        @endif
                                                    </div>
                                                    <h5>Social</h5>

                                                    <ul class="list-default-sq list-style-inline-sq">
                                                        <li><a href="https://www.facebook.com/seventhqueen.themes"
                                                               target="_blank">
                                                                <i class="icon icon-logo-facebook2"></i></a>
                                                        </li>
                                                        <li><a href="https://twitter.com/seventhqueen" target="_blank">
                                                                <i class="icon icon-logo-twitter-bird2"></i></a>
                                                        </li>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="ui twelve wide computer column">

                                    <div class="typo-header-sq">
                                        <div class="ui grid">
                                            <div class="row">
                                                <div
                                                    class="twelve wide mobile six wide tablet eight wide computer eight wide widescreen eight wide large screen column"
                                                    id="products">
                                                    <h3>Recent orders pending <sup>4</sup></h3>
                                                </div>

                                                <div
                                                    class="twelve wide mobile six wide tablet four wide computer four wide widescreen four wide large screen column">
                                                    <ul class="dashboard-filter list-style-inline-sq list-default-sq">
                                                        <li>
                                                            <a href="" class="active">
                                                                <i class="icon big icon-slim-arrow-right"></i>
                                                                View more
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="ui grid">
                                        <div class="row">

                                            @foreach($Booking as $item)
                                                <div
                                                    class="ui twelve wide mobile six wide tablet six wide computer four wide widescreen four wide large screen column">
                                                    <div class="dashboard-order-boxes-sq">
                                                        <span
                                                            class="dashboard-label-sq">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d M Y, H:i')}}</span>

                                                        <p class="dashboard-content-sq">
                                                            <strong>
                                                                @foreach($Vehicle as $item2)
                                                                    @if($item2 -> id == $item -> id_vehicle)
                                                                        {{$item2 -> name}}
                                                                    @endif
                                                                @endforeach
                                                            </strong>
                                                        </p>

                                                        <span class="dashboard-label-sq">Reserved by</span>
                                                        <div class="dashboard-content-sq">

                                                            <p class="flex-grow-true">
                                                                @foreach($UserAll as $item2)
                                                                    @if($item2 -> id == $item -> id_user)
                                                                        {{$item2 -> name}}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <div class="avatar-sq tiny-avatar-sq verified-sq">
                                                                @foreach($UserAll as $item2)
                                                                    @if($item2 -> id == $item -> id_user)
                                                                        <img
                                                                            src="upload/image/user_image/{{$item2->image}}"
                                                                            alt="">
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </div>

                                                        <span class="dashboard-label-sq">Total</span>
                                                        <p class="dashboard-content-sq">
                                                            <strong>&euro;
                                                                @foreach($Vehicle as $item2)
                                                                    @if($item2 -> id == $item -> id_vehicle)
                                                                        {{number_format($item2 -> daily_price*(\Carbon\Carbon::parse($item -> return_date)->diffInDays(\Carbon\Carbon::parse($item -> pickup_date))), 2)}}
                                                                    @endif
                                                                @endforeach
                                                            </strong></p>
                                                        <span class="dashboard-label-sq">Status</span>
                                                        @if($item -> status == 0)
                                                            <p class="dashboard-content-sq dashboard-status-sq"
                                                               style="color: 	#FFA500">
                                                                <strong>
                                                                    Pending
                                                                </strong>
                                                            </p>
                                                        @elseif ($item -> status == 1)
                                                            <p class="dashboard-content-sq dashboard-status-sq processing-sq">
                                                                <strong>
                                                                    Processing
                                                                </strong>
                                                            </p>
                                                        @elseif ($item -> status == 2)
                                                            <p class="dashboard-content-sq dashboard-status-sq"
                                                               style="color: red">
                                                                <strong>
                                                                    Declined
                                                                </strong>
                                                            </p>
                                                        @endif
                                                        <a href=""
                                                           class="button-sq see-through-sq fullwidth-sq modal-ui-trigger"
                                                           data-trigger-for="uimodal{{$item->id}}">View <i
                                                                class="icon icon-slim-arrow-right"></i></a>
                                                        <div class="ui modal small" data-for="uimodal{{$item->id}}">

                                                            <i class="icon icon-close close-modal"></i>

                                                            <div class="header center">
                                                                <br>
                                                                <h4>Process order: {{$item -> id}}</h4>
                                                            </div>

                                                            <div class="content">
                                                                <h4>Order Detail</h4>
                                                                <h5>User information: </h5>
                                                                @foreach($UserAll as $item2)
                                                                    @if($item2 -> id == $item -> id_user)
                                                                        <div class="div-c inline-2">
                                                                            <div class="divided-column">
                                                                                <label>User name</label>
                                                                                <input type="text" disabled
                                                                                       value="{{$item2 -> name}}">
                                                                            </div>

                                                                            <div class="divided-column">
                                                                                <label>Email</label>
                                                                                <input type="text" disabled
                                                                                       value="{{$item2 -> email}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="div-c">
                                                                            <label>Address</label>
                                                                            <input type="text" disabled
                                                                                   value="{{$item2 -> address}}">
                                                                        </div>

                                                                        <div class="div-c inline-2">
                                                                            <div class="divided-column">
                                                                                <label>Phone number</label>
                                                                                <input type="text" disabled
                                                                                       value="{{$item2 -> phone}}">
                                                                            </div>

                                                                            <div class="divided-column">
                                                                                <label>Email</label>
                                                                                <input type="text" disabled
                                                                                       value="{{$item2 -> email}}">
                                                                            </div>
                                                                        </div>

                                                                        <label>Driver License</label>
                                                                        <img
                                                                            src="upload/image/driver_license_image/{{$item -> driver_license}}"
                                                                            class="image-sq" alt=""
                                                                            style="width: 300px;height: auto">

                                                                        <br><br>
                                                                    @endif
                                                                @endforeach

                                                                <h5>Order information: </h5>
                                                                @foreach($Vehicle as $item2)
                                                                    @if($item2 -> id == $item -> id_vehicle)

                                                                        <div class="div-c inline-2 inline-check-in">

                                                                            <div class="divided-column calendar-sq"
                                                                                 id="rangestart">
                                                                                <label class="placeholder">Check
                                                                                    in</label>

                                                                                <div class="relative-sq">
                                                                                    <input type="text"
                                                                                           name="pickup_date"
                                                                                           class="filter"
                                                                                           value="{{$item -> pickup_date}}"
                                                                                           required
                                                                                           placeholder="date" disabled>
                                                                                    <i class="icon icon-little-arrow filters-arrow"></i>
                                                                                </div>

                                                                            </div>

                                                                            <div class="divided-column calendar-sq"
                                                                                 id="rangeend">

                                                                                <label class="placeholder">Check
                                                                                    Out</label>

                                                                                <input type="text" class="filter"
                                                                                       disabled name="return_date"
                                                                                       value="{{$item -> return_date}}"
                                                                                       required
                                                                                       placeholder="date">

                                                                            </div>
                                                                        </div>

                                                                        <div class="div-c">
                                                                            @foreach($PickupLocation as $item3)
                                                                                @if($item3 -> id == $item -> id_pickup_location)
                                                                                    <label>Pickup Location</label>
                                                                                    <input type="text" disabled
                                                                                           value="{{$item3 -> name}}">
                                                                                @endif
                                                                            @endforeach
                                                                        </div>

                                                                        <div class="div-c inline-2">
                                                                            <div class="divided-column">
                                                                                <label>Vehical name:</label>
                                                                                <input type="text" disabled
                                                                                       value="{{$item2 -> name}}">
                                                                            </div>
                                                                        </div>

                                                                        <label>Vehicle image</label>
                                                                        <img
                                                                            src="upload/image/vehicle_image/{{$item2 -> image}}"
                                                                            class="image-sq" alt="">

                                                                        <br><br>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            @if($item -> status == 0)
                                                                <div class="actions">
                                                                    <div class="div-c inline-2">
                                                                        <div class="divided-column">
                                                                            <a class="button-sq cancel-sq fullwidth-sq"
                                                                               href="order/decline/{{$item -> id}}">Decline</a>
                                                                        </div>

                                                                        <div class="divided-column">
                                                                            <a class="button-sq fullwidth-sq"
                                                                               href="order/confirm/{{$item -> id}}">Confirm</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    @endif
@endsection

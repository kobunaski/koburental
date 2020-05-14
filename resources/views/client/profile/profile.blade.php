@extends('client.layout.index')

@section('content')
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
                                                @if($user_login -> verify_email == 0)
                                                    <h5>Verify your email</h5>

                                                    <div class="location-sq">
                                                        <a href="profile/verify-email/{{$user_login -> id}}"
                                                           class="button-sq font-weight-bold-sq">Verify your email</a>
                                                    </div>
                                                @endif
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
                                                    <li><a href="https://www.facebook.com/"
                                                           target="_blank">
                                                            <i class="icon icon-logo-facebook2"></i></a>
                                                    </li>
                                                    <li><a href="https://twitter.com/" target="_blank">
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
                                                    <h3>Recent orders history <sup>{{count($Booking)}}</sup></h3>
                                                </div>

                                                <div
                                                    class="twelve wide mobile six wide tablet four wide computer four wide widescreen four wide large screen column">
                                                    <ul class="dashboard-filter list-style-inline-sq list-default-sq">
                                                        <li>
                                                            <a href="profile/view/order/all" class="active">
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
                                            <?
                                            $count = 0;
                                            ?>
                                            @foreach($Booking as $item)
                                                <?
                                                $count++;
                                                ?>
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

                                                        @if($item -> id_staff ==0)
                                                            <span class="dashboard-label-sq">Reserved by</span>
                                                            <div class="dashboard-content-sq">
                                                                <p class="flex-grow-true">
                                                                    @foreach($User as $item2)
                                                                        @if($item2 -> id == $item -> id_user)
                                                                            {{$item2 -> name}}
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                                <div class="avatar-sq tiny-avatar-sq verified-sq">
                                                                    @foreach($User as $item2)
                                                                        @if($item2 -> id == $item -> id_user)
                                                                            <img
                                                                                src="upload/image/user_image/{{$item2->image}}"
                                                                                alt="">
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @else
                                                            <span class="dashboard-label-sq">Processed by</span>
                                                            <div class="dashboard-content-sq">
                                                                <p class="flex-grow-true">
                                                                    @foreach($User as $item2)
                                                                        @if($item2 -> id == $item -> id_staff)
                                                                            {{$item2 -> name}}
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                                <div class="avatar-sq tiny-avatar-sq verified-sq">
                                                                    @foreach($User as $item2)
                                                                        @if($item2 -> id == $item -> id_staff)
                                                                            <img
                                                                                src="upload/image/user_image/{{$item2->image}}"
                                                                                alt="">
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <span class="dashboard-label-sq">Total</span>
                                                        <p class="dashboard-content-sq">
                                                            <strong>&dollar;
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
                                                            <p class="dashboard-content-sq dashboard-status-sq processing-sq"
                                                               style="color: 	#FFA500">
                                                                <strong>
                                                                    Pending payment
                                                                </strong>
                                                            </p>
                                                        @elseif ($item -> status == 2)
                                                            <p class="dashboard-content-sq dashboard-status-sq processing-sq">
                                                                <strong>
                                                                    Processing
                                                                </strong>
                                                            </p>
                                                        @elseif ($item -> status == 3)
                                                            <p class="dashboard-content-sq dashboard-status-sq completed-sq">
                                                                <strong>
                                                                    Completed
                                                                </strong>
                                                            </p>
                                                        @elseif ($item -> status == 4)
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

                                                                @if($item -> id_staff != 0)
                                                                    @foreach($User as $item2)
                                                                        @if($item2 -> id == $item -> id_staff)
                                                                            Processed by: {{$item2 -> name}}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>

                                                            @if($item -> status == 2)
                                                                @foreach($Payment as $item2)
                                                                    @if($item2 -> id_booking == $item -> id)
                                                                        @if($item2 -> return_date < $item -> return_date)
                                                                            <div class="header center">
                                                                                <h5>This order has extended their date</h5>
                                                                                <span>Fee that are not paid: &dollar;
                                                                        @foreach($Vehicle as $item3)
                                                                                        @if($item3 -> id == $item -> id_vehicle)
                                                                                            {{$item3 -> daily_price*(\Carbon\Carbon::parse($item -> return_date)->diffInDays(\Carbon\Carbon::parse($item -> pickup_date))) - $item2 -> total_price}}
                                                                                        @endif
                                                                                    @endforeach
                                                                    </span>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            <div class="content">
                                                                <h4>Order Detail</h4>
                                                                <h5>User information: </h5>
                                                                @foreach($User as $item2)
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
                                                                        </div>

                                                                        <label>Driver License</label>
                                                                        <img
                                                                            src="upload/image/driver_license_image/{{$item2 -> driver_license}}"
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
                                                                                <a href="vehicle/detail/{{$item2 -> id}}">{{$item2 -> name}}</a>
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
                                                                @if($user_login -> id_role != 3)
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
                                                            @endif
                                                            @if($item -> status == 1)
                                                                @if($user_login -> id_role == 3 && $item -> id_user == $user_login -> id)
                                                                    <div class="actions">
                                                                        <div class="div-c inline-2">
                                                                            <div class="divided-column">
                                                                                <a class="button-sq cancel-sq fullwidth-sq"
                                                                                   href="order/decline/{{$item -> id}}">Cancel
                                                                                    order</a>
                                                                            </div>

                                                                            <div class="divided-column">
                                                                                <a class="button-sq fullwidth-sq"
                                                                                   href="order/payment/{{$item -> id}}">Go to
                                                                                    payment</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($user_login -> id_role != 3 && $item -> id_staff == $user_login -> id)
                                                                    <div class="actions">
                                                                        <div class="div-c">
                                                                            <div class="divided-column">
                                                                                <a class="button-sq cancel-sq fullwidth-sq"
                                                                                   href="order/decline/{{$item -> id}}">Cancel
                                                                                    order</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if($item -> status == 2)
                                                                @if($user_login -> id_role == 3 && $item -> id_user == $user_login -> id)
                                                                    <div class="actions">
                                                                        <div class="div-c">
                                                                            <div class="divided-column">
                                                                                <a class="button-sq fullwidth-sq  modal-ui-trigger"
                                                                                   data-trigger-for="extend{{$item->id}}"
                                                                                   id="extend{{$item->id}}">Extend
                                                                                    order</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ui modal" data-for="extend{{$item->id}}">

                                                                        <i class="icon icon-close close-modal"></i>

                                                                        <div class="header center">
                                                                            <h4>Extend rental date</h4>
                                                                            @if(Session('no-extend'))
                                                                                <span style="color: #FF5C5C">Somebody has booked this vehicle on this date</span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="content">
                                                                            <form action="order/extend/{{$item -> id}}"
                                                                                  method="POST">
                                                                                <input type="hidden" name="_token"
                                                                                       value="{{csrf_token()}}"/>

                                                                                <div class="div-c inline-2 inline-check-in">
                                                                                    <div class="divided-column calendar-sq"
                                                                                         id="rangestart{{$item->id}}">
                                                                                        <label class="placeholder">Check
                                                                                            in</label>

                                                                                        <div class="relative-sq">
                                                                                            <input type="text"
                                                                                                   class="filter"
                                                                                                   value="{{$item -> pickup_date}}"
                                                                                                   required
                                                                                                   disabled
                                                                                                   placeholder="date">
                                                                                            <i class="icon icon-little-arrow filters-arrow"></i>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="divided-column calendar-sq"
                                                                                         id="rangeend{{$item->id}}">

                                                                                        <label class="placeholder">Check
                                                                                            Out</label>

                                                                                        <input type="text" class="filter"
                                                                                               name="return_date"
                                                                                               value="{{$item -> return_date}}"
                                                                                               required
                                                                                               placeholder="date">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="div-c inline-2">
                                                                                    <div class="divided-column">
                                                                                        <div
                                                                                            class="button-sq cancel-sq fullwidth-sq">
                                                                                            Cancel
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="divided-column">
                                                                                        <button type="submit"
                                                                                                class="button-sq fullwidth-sq">
                                                                                            Extend
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @elseif($user_login -> id_role != 3 && $item -> id_staff == $user_login -> id)
                                                                    <div class="actions">
                                                                        <div class="div-c">
                                                                            <div class="divided-column">
                                                                                <a class="button-sq fullwidth-sq"
                                                                                   href="order/complete/{{$item -> id}}">Complete
                                                                                    order</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if($count == 0)
                                                <div
                                                    class="ui twelve wide mobile six wide tablet six wide computer four wide widescreen four wide large screen column">
                                                    No Orders
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
    @if(Session('alert'))
        <!-- Modal trigger -->
        <a class="button-sq see-through-sq small-sq modal-ui-trigger" data-trigger-for="alert-verify" id="alert-verify"></a>

        <!-- Modal -->
        <div class="ui modal" data-for="alert-verify">

            <i class="icon icon-close close-modal"></i>

            <div class="header center">
                <h4>Email has been sent</h4>
            </div>

            <div class="content">
                <p>An email has been sent to you to verify your email</p>
            </div>
        </div>
    @endif

    @if(Session('success-extend'))
        <a class="button-sq see-through-sq small-sq modal-ui-trigger" id="success-extend"
           data-trigger-for="success-extend"></a>

        <!-- Modal -->
        <div class="ui modal" data-for="success-extend">

            <i class="icon icon-close close-modal"></i>

            <div class="header center">
                <h4>{{Session('success-extend')}}</h4>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        @foreach($Booking as $item)
        $('#rangestart{{$item->id}}').calendar({
            type: 'date',
            endCalendar: $('#rangeend{{$item->id}}'),
            //inline: true,
            className: {
                prevIcon: "icon icon-arrow-left-122",
                nextIcon: "icon icon-arrow-right-122"
            }
        });

        $('#rangeend{{$item->id}}').calendar({
            type: 'date',
            startCalendar: $('#rangestart{{$item->id}}'),
            //inline: true,
            className: {
                prevIcon: "icon icon-arrow-left-122",
                nextIcon: "icon icon-arrow-right-122"
            }
        });
        @endforeach
    </script>
    @if(Session('alert'))
        <script type="text/javascript">
            $("document").ready(function () {
                $('#alert-verify').trigger('click');
            });
        </script>
    @endif
    @if(Session('no-extend'))
        <script type="text/javascript">
            $("document").ready(function () {
                $('#extend{{Session('no-extend')}}').trigger('click');
            });
        </script>
    @endif
    @if(Session('success-extend'))
        <script type="text/javascript">
            $("document").ready(function () {
                $('#success-extend').trigger('click');
            });
        </script>
    @endif
@endsection

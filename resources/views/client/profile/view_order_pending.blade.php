@extends('client.layout.index')

@section('content')
    @if($user_login)

        <div class="ui layout">

            <!-- grid -->
            <div class="ui grid container">

                <div class="row">

                    @include('client.profile.profile_menu')

                    <div
                        class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">

                        @include('client.profile.view_order_header')

                        <div class="ui grid">
                            <div class="row">
                                <?
                                $count = 0;
                                ?>
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
                                                <?$count++?>
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
                                            @elseif ($item -> status == 3)
                                                <p class="dashboard-content-sq dashboard-status-sq complete-sq">
                                                    <strong>
                                                        Completed
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

                                    @if($count == 0)
                                        <div
                                            class="ui twelve wide mobile six wide tablet six wide computer four wide widescreen four wide large screen column">
                                            No Orders
                                        </div>
                                    @endif


                                    <div
                                        class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                                        {{ $Booking->appends(\Request::except('_token'))->render() }}
                                    </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    @endif
@endsection

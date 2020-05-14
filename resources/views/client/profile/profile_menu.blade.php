<div
    class="ui twelve wide tablet three wide computer three wide widescreen three wide large screen column">
    <br>
    <div class="sticky-element sticky-desktop sticky-large-desktop under-ths after-element">
        <div class="dashboard-sticky with-avatar">
            <div class="dashboard-sticky-inner">
                <div class="dashboard-details">
                                    <span
                                        class="dashboard-avatar avatar-sq large-avatar-sq @if($user_login->verify_email == 1) verified-sq @endif">
                                        <img src="upload/image/user_image/{{$user_login -> image}}" alt="">
                                    </span>

                    <div class="dashboard-texts">
                        <h2 class="dashboard-name">{{$user_login -> name}}</h2>
                        <div class="dashboard-subtitle">Vendor</div>
                    </div>
                </div>

                <div class="dashboard-menu has-submenu">
                    <a href="#" class="item">
                        <i class="icon icon-side-sticky-menu"></i>
                    </a>
                    <ul class="submenu">
                        <li class="{{Request()->is('profile') ? "active" : ""}}"><a class="item" href="profile">About
                                Me</a></li>
                        <li class="{{Request()->is('profile/edit') ? "active" : ""}}"><a class="item"
                                                                                         href="profile/edit">Edit
                                Profile</a></li>
                        @if($user_login -> id_role == 2 || $user_login -> id_role == 1)
                            <li class="{{Request()->is('profile/view/order/all') || Request()->is('profile/view/order/pending') || Request()->is('profile/view/order/processing') || Request()->is('profile/view/order/completed') || Request()->is('profile/view/order/declined') ? "active" : ""}}">
                                <a class="item" href="profile/view/order/all">Manage Orders</a></li>
                        @else
                            <li class="{{Request()->is('profile/view/order/all') || Request()->is('profile/view/order/pending') || Request()->is('profile/view/order/processing') || Request()->is('profile/view/order/completed') || Request()->is('profile/view/order/declined') ? "active" : ""}}">
                                <a class="item" href="profile/view/order/all">View Orders</a></li>
                        @endif
                        <li><a class="item" href="#reviews">Reviews</a></li>
                    </ul>
                </div>

                {{--<a class="dashboard-contact button-sq font-weight-bold-sq modal-ui-trigger"--}}
                   {{--data-trigger-for="contact" href="">--}}
                    {{--<i class="icon icon-messenger"></i>--}}
                    {{--<span>Contact</span>--}}
                {{--</a>--}}
            </div>

        </div>
    </div>

</div>

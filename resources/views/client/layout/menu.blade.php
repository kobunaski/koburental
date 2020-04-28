<div class="header-item header-right flex-align-right">

    <!-- Sidemenu Trigger -->
    <a class="sidemenu-trigger hamburger item" data-trigger-for="menu01">

                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
    </a>


    <!-- Include Menu -->

    <!-- Header Menu-->

    <div
        class="menu-default burger-sidemenu sidemenu-open-right icons-left profile-priority slide-out-sq dimmed dropdown-open-right"
        data-burger="menu01">

        <a class="sidemenu-trigger xclose-sq hamburger hamburger-elastic item" data-trigger-for="menu01">

			<span class="hamburger-box">
			  <span class="hamburger-inner"></span>
			</span>
        </a>

        <ul class="main-menu">

            @if(isset($user_login))
                <li class="profile-item has-submenu" tabindex="0">
                    <a href="#" class="item">
                        <span>{{$user_login -> name}}</span>
                        <img src="upload/image/user_image/{{$user_login -> image}}" alt="">
                    </a>
                    <ul class="submenu transition hidden" tabindex="-1">
                        <li><a href="profile" class="item"><span>My Profile</span></a></li>
                        <li><a href="my_settings.html" class="item"><span>Account Settings</span></a></li>
                        <li>
                            <hr>
                        </li>
                        <li><a href="logout" class="item"><span>Log Out</span></a></li>
                    </ul>
                </li>
            @else
                <li><a href="#" class="item modal-ui-trigger" data-trigger-for="modal02">
                        <span>Log In</span>
                    </a>
                </li>

                <li><a href="#" class="item modal-ui-trigger" data-trigger-for="modal01">
                        <span>Sign up</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="vehicle" class="item">
                    <span>View all cars</span>
                </a>
            </li>

            <li>
                <a href="about" class="item">
                    <span>About us</span>
                </a>
            </li>

            <li>
                <a href="contact" class="item">
                    <span>Contact us</span>
                </a>
            </li>

            @if(isset($user_login))
                @if($user_login -> id_role == 1)
                    <li>
                        <a href="admin/home" class="item">
                            <span>Go to admin site</span>
                        </a>
                    </li>
                @endif
            @endif

            @if(isset($user_login))
                @if($user_login -> id_role == 4)
                    <li><a href="become_a_vendor.html" class="item">
                            <span>Register a new car</span>
                        </a>
                    </li>
                @endif
            @endif

        </ul>
    </div>

    <!-- End of Header Menu-->

</div>

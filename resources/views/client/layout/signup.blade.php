
<div class="ui full modal" data-for="modal01">
    <div class="modal-full-background">
        <img src="client_assets/assets/images/modal/modal_background_001.jpg" alt="">
    </div>

    <i class="icon icon-close close-modal"></i>

    <div class="header center">
        Sign Up Now
    </div>

    <div class="content">
        <a href="" class="button-sq fullwidth-sq modal-ui-trigger" data-trigger-for="modal03">
            <i class="icon icon-email-2"></i>
            <span>Sign Up with Email</span>
        </a>

        <a href="" class="button-sq fullwidth-sq facebook-button">
            <i class="icon icon-logo-facebook2"></i>
            <span>Sign Up with Facebook</span>
        </a>

        <a href="" class="button-sq fullwidth-sq google-button">
            <img src="client_assets/assets/images/icon-google-plus.svg" alt="">
            <span>Sign Up with Google</span>
        </a>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>
    </div>

    <div class="actions">
        <div class="border-container">
            <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal02">Already a member?</div>

            <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal02">
                Log In
                <i class="icon icon-person-lock-2"></i>
            </div>
        </div>
    </div>
</div>

<!-- Sign Up with mail -->
<div class="ui full modal" data-for="modal03">
    <div class="modal-full-background">
        <img src="client_assets/assets/images/modal/modal_background_001.jpg" alt="">
    </div>

    <i class="icon icon-close close-modal"></i>

    <div class="header center">
        Sign Up Now
    </div>

    <div class="content">
        <form action="signup" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        <div class="div-c">
            <div class="divided-column">
                <input type="text" placeholder="Full Name" name="name" required>
            </div>
        </div>

        <div class="div-c">
            <div class="divided-column">
                <input type="email" placeholder="E-mail Adress" name="email" required>
            </div>
            <div class="divided-column">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="divided-column">
                <input type="password" placeholder="Please confirm your password" name="password_confirm" required>
            </div>
        </div>

        {{--<div class="div-c inline-3 one-label">--}}
            {{--<label>Birthday</label>--}}
            {{--<div class="divided-column">--}}
                {{--<select name="dropdown"  class="dropdown">--}}
                    {{--<option value="1">01</option>--}}
                    {{--<option value="2">02</option>--}}
                    {{--<option value="3">03</option>--}}
                    {{--<option value="4">04</option>--}}
                    {{--<option value="5">05</option>--}}
                    {{--<option value="6">...</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="divided-column">--}}
                {{--<select name="dropdown"  class="dropdown">--}}
                    {{--<option value="1">Jan</option>--}}
                    {{--<option value="2">Feb</option>--}}
                    {{--<option value="3">Mar</option>--}}
                    {{--<option value="4">Apr</option>--}}
                    {{--<option value="5">May</option>--}}
                    {{--<option value="6">...</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="divided-column">--}}
                {{--<select name="dropdown"  class="dropdown">--}}
                    {{--<option value="1">1985</option>--}}
                    {{--<option value="2">1986</option>--}}
                    {{--<option value="3">1987</option>--}}
                    {{--<option value="4">1988</option>--}}
                    {{--<option value="5">1989</option>--}}
                    {{--<option value="6">...</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}

        <button class="button-sq fullwidth-sq">Sign Up</button>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

        </form>
    </div>

    <div class="actions">
        <div class="border-container">
            <div class="button-sq link-sq"></div>

            <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                Log In
                <i class="icon icon-person-lock-2"></i>
            </div>
        </div>
    </div>
</div>

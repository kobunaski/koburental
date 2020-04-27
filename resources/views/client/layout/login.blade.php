<div class="ui full modal" data-for="modal02">
    <div class="modal-full-background">
        <img src="client_assets/assets/images/modal/modal_background_001.jpg" alt="">
    </div>

    <i class="icon icon-close close-modal"></i>

    <div class="header center">
        Log In
    </div>

    <div class="content">
        <form action="login" method="POST" id="login">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="div-c">
                <div class="divided-column">
                    <input type="text" placeholder="E-mail Address" name="email" >
                </div>
                <div class="divided-column">
                    <input type="password" placeholder="Password" name="password" >
                </div>
            </div>

            <button type="submit" class="button-sq fullwidth-sq">Log In</button>
            <p>
            </p>
        </form>
    </div>

    <div class="actions">
        <div class="border-container">
            <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal01">Don’t have an account?</div>

            <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                Sign Up
                <i class="icon icon-person-add-1"></i>
            </div>
        </div>
    </div>
</div>

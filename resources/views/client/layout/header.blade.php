

<!--DEFAULT HEADER-->

<header class="{{ (request()->is('')) || (request()->is('home')) || (request()->is('index')) ? 'header-section ths header-shadow header-sticky header-slide-up header-transparent is-transparent equal-tablet-header-items equal-mobile-header-items' : 'header-section ths header-sticky header-slide-up equal-tablet-header-items equal-mobile-header-items header-shadow' }}">
    <div class="header-content">

        <div class="ui container grid">
            <div class="header-item header-left">

            </div>

            <div class="header-item header-center flex-grow-true">

                <a class="logo item" href="home">
                    <img src="client_assets/assets/images/logo-client.png" srcset="client_assets/assets/images/logo-client.png 1x, client_assets/assets/images/logo-client.png 2x" alt="myCar logo" class="logo-transparent">

                    <img src="client_assets/assets/images/logo-dark.png" srcset="client_assets/assets/images/logo-dark.png 1x, client_assets/assets/images/logo-dark.png 2x" alt="myCar logo">
                </a>
            </div>
        @include('client/layout/menu')
        </div>

    </div>
</header>

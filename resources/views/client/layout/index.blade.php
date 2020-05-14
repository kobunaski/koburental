<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Standard Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SeventhQueen" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="client_assets/assets/less/base.min.css">
    <link rel="stylesheet" type="text/css" href="client_assets/assets/less/header.min.css">
    <link rel="stylesheet" type="text/css" href="client_assets/assets/less/theme.min.css">
    <link rel="stylesheet" type="text/css" href="client_assets/assets/icon/style.css">
    <link rel="stylesheet" type="text/css" href="client_assets/custom.css">
    <link rel="icon" href="client_assets/assets/images/ico/logo-head.png">

    <script src="client_assets/assets/library/modernizr-custom.js"></script>

    <title>KoBu Car Rental</title>

</head>
<body class="no-transition">
<div id="page-wrapper">

    <!--

Default Header with a White Background & Dark text.

-->
    @include('client/layout/header')

    @yield('content')

    <!-- Modals -->

    <!-- Sign Up -->
    @include('client/layout/signup')

    <!-- Log In -->
    @include('client/layout/login')

    <!-- Wishlist -->
    <div class="ui modal small" data-for="wishlist">
        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            <h4>Wishlist</h4>
        </div>

        <div class="content">
            <p>Mauris malesuada leo libero, vitae tempor ante sagittis vitae. Suspendisse consectetur facilisis enim.</p>
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

    <!--FOOTER-->
    @if(View::hasSection('footer'))
        @yield('footer')
    @else
        @include('client/layout/footer')
    @endif


</div><!--end #page-wrapper-->
<script src="client_assets/assets/library/jquery-2.2.0.min.js"></script>
<script src="client_assets/assets/library/flexmenu.js"></script>
<script src="client_assets/assets/library/nouislider.min.js"></script>

<script src="client_assets/assets/library/wNumb.js"></script>

<script src="client_assets/assets/library/jrespond.min.js"></script>
<script src="client_assets/assets/library/scrollspy.min.js"></script>

<script src="client_assets/assets/library/visibility.js"></script>

<script src="client_assets/assets/library/accordion.js"></script>
<script src="client_assets/assets/library/dropdown-custom.js"></script>
<script src="client_assets/assets/library/sticky.js"></script>

<script src="client_assets/assets/library/page-transition.js"></script>
<script src="client_assets/assets/library/checkbox.js"></script>
<script src="client_assets/assets/library/transition.js"></script>
<script src="client_assets/assets/library/sidebar.js"></script>

<script src="client_assets/assets/library/modal.js"></script>
<script src="client_assets/assets/library/dimmer.js"></script>

<!-- Datepicker -->
<script src="client_assets/assets/library/popup.js"></script>
<script src="client_assets/assets/library/calendar.js"></script>

<!-- Slick -->
<script src="client_assets/assets/library/slick.js"></script>

<script src="client_assets/assets/library/header.js"></script>
<script src="client_assets/assets/library/functions.js"></script>
@if(Session('loginError'))
    <script type="text/javascript">
        $("document").ready(function () {
            $('#modal02').trigger('click');
        });
    </script>
@endif
@if(Session('payment-success'))
    <script type="text/javascript">
        $("document").ready(function () {
            $('#payment-success').trigger('click');
        });
    </script>
@endif
@yield('script')
</body>

</html>

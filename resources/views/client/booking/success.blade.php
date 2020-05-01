@extends('client.layout.index')

@section('content')
    <div class="ui layout">
        <div class="ui centered grid container">
            <div class="row">
                <div class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">

                    @if(Session('vehicle_name'))
                        <br>
                        <br>
                        <br>
                        <br>
                        <h3 class="text-align-center-sq">
                            Your Vehicle have success fully reserved. Your vehicle: {{Session('vehicle_name')}}
                        </h3>
                        <br>

                        <p class="text-align-center-sq">Please wait for the staff to confirm your reservation. You can
                            also view your reservation in the link below: </p>
                        <br>
                        <div class="text-align-center-sq">
                            <a class="button-sq font-weight-bold-sq" href="">View reservations</a>
                        </div>
                        @else
                        <br>
                        <br>
                        <br>
                        <br>
                        <h1 class="text-align-center-sq">
                            Page not available
                        </h1>

                        <div class="text-align-center-sq">
                            <i class="icon big icon-slim-arrow-right"></i>
                            <a class="button-sq link-sq" href="home">Go to homepage</a>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection

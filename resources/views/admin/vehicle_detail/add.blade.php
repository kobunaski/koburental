@extends('admin.layout.index')

@section('header')
    <link href="admin_assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Initialisation</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    @if($VehicleExist == true)
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- basic table -->
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit the attributes from <span
                                    class="text-danger">{{$Vehicle -> name}}</span>
                            </h4>
                            <h6 class="card-subtitle">Remember to <code>input</code> every field</h6>
                            @if(session('notificate'))
                                <div class="alert alert-success">
                                    {{session('notificate')}}
                                </div>
                            @endif
                            <form class="mt-4" action="admin/vehicle_detail/edit/{{$VehicleDetail -> id}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label>Number of seats</label>
                                    <input type="number"
                                           class="form-control col-md-12 {{ $errors->has('seat') ? 'is-invalid' : ''}}"
                                           placeholder="Number of seats" name="seat" value="{{$VehicleDetail -> seat}}">
                                    {!! $errors->first('seat', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label>Number of doors</label>
                                    <input type="number"
                                           class="form-control col-md-12 {{ $errors->has('door') ? 'is-invalid' : ''}}"
                                           placeholder="Number of doors" name="door" value="{{$VehicleDetail -> door}}">
                                    {!! $errors->first('door', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label>Vehicle Fuel Type</label>
                                    <select name="fuel"
                                            class="form-control {{ $errors->has('fuel') ? 'is-invalid' : ''}}">
                                        <option selected disabled>Choose vehicle fuel type</option>
                                        @if($VehicleDetail -> fuel == 1)
                                            <option value="1" selected>Gasoline</option>
                                            <option value="2">Diesel</option>
                                        @else
                                            <option value="1">Gasoline</option>
                                            <option value="2" selected>Diesel</option>
                                        @endif
                                    </select>
                                    {!! $errors->first('fuel', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="air_con" value="1"
                                           @if($VehicleDetail -> air_con == 1)
                                           checked
                                           @endif
                                           class="custom-control-input"
                                           id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Air Conditioner</label>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="bluetooth" value="1"
                                           @if($VehicleDetail -> bluetooth == 1) checked
                                           @endif class="custom-control-input"
                                           id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Bluetooth</label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label>Vehicle Gearbox Type</label>
                                    <select name="gearbox"
                                            class="form-control {{ $errors->has('gearbox') ? 'is-invalid' : ''}}">
                                        <option selected disabled>Choose vehicle gearbox type</option>
                                        @if($VehicleDetail -> gearbox == 1)
                                            <option value="1" selected>Traditional Automatic Transmission</option>
                                            <option value="2">Automated-Manual Transmission</option>
                                            <option value="3">Dual-Clutch Transmission</option>
                                            <option value="4">Manual Transmission</option>
                                        @elseif($VehicleDetail -> gearbox == 2)
                                            <option value="1">Traditional Automatic Transmission</option>
                                            <option value="2" selected>Automated-Manual Transmission</option>
                                            <option value="3">Dual-Clutch Transmission</option>
                                            <option value="4">Manual Transmission</option>
                                        @elseif($VehicleDetail -> gearbox == 3)
                                            <option value="1">Traditional Automatic Transmission</option>
                                            <option value="2">Automated-Manual Transmission</option>
                                            <option value="3" selected>Dual-Clutch Transmission</option>
                                            <option value="4">Manual Transmission</option>
                                        @elseif($VehicleDetail -> gearbox == 4)
                                            <option value="1">Traditional Automatic Transmission</option>
                                            <option value="2">Automated-Manual Transmission</option>
                                            <option value="3">Dual-Clutch Transmission</option>
                                            <option value="4" selected>Manual Transmission</option>
                                        @endif
                                    </select>
                                    {!! $errors->first('gearbox', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="admin/vehicle/view" class="btn btn-dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    @else
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- basic table -->
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add attributes to <span
                                    class="text-danger">{{$Vehicle -> name}}</span>
                            </h4>
                            <h6 class="card-subtitle">Remember to <code>input</code> every field</h6>
                            @if(session('notificate'))
                                <div class="alert alert-success">
                                    {{session('notificate')}}
                                </div>
                            @endif
                            <form class="mt-4" action="admin/vehicle_detail/add/{{$Vehicle -> id}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <input type="number"
                                           class="form-control col-md-12 {{ $errors->has('seat') ? 'is-invalid' : ''}}"
                                           placeholder="Number of seats" name="seat">
                                    {!! $errors->first('seat', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <input type="number"
                                           class="form-control col-md-12 {{ $errors->has('door') ? 'is-invalid' : ''}}"
                                           placeholder="Number of doors" name="door">
                                    {!! $errors->first('door', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <select name="fuel"
                                            class="form-control {{ $errors->has('fuel') ? 'is-invalid' : ''}}">
                                        <option selected disabled>Choose vehicle fuel type</option>
                                        <option value="1">Gasoline</option>
                                        <option value="2">Diesel</option>
                                    </select>
                                    {!! $errors->first('fuel', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="air_con" value="1" class="custom-control-input"
                                           id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Air Conditioner?</label>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="bluetooth" value="1" class="custom-control-input"
                                           id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Bluetooth</label>
                                </div>

                                <br>
                                <div class="form-group">
                                    <select name="gearbox"
                                            class="form-control {{ $errors->has('gearbox') ? 'is-invalid' : ''}}">
                                        <option selected disabled>Choose vehicle gearbox type</option>
                                        <option value="1">Traditional Automatic Transmission</option>
                                        <option value="2">Automated-Manual Transmission</option>
                                        <option value="3">Dual-Clutch Transmission</option>
                                        <option value="4">Manual Transmission</option>
                                    </select>
                                    {!! $errors->first('gearbox', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="admin/vehicle/view" class="btn btn-dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    @endif
@endsection

@section('script')

@endsection

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
                        <h4 class="card-title">Add new vehicle</h4>
                        <h6 class="card-subtitle">Remember to <code>input</code> every field</h6>
                        @if(session('notificate'))
                            <div class="alert alert-success">
                                {{session('notificate')}}
                            </div>
                        @endif
                        <form class="mt-4" action="admin/vehicle/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control col-md-12 {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                       placeholder="Vehicle Name" name="name">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <select name="id_pickup_location" class="form-control {{ $errors->has('id_pickup_location') ? 'is-invalid' : ''}}">
                                    <option selected disabled>Choose the location</option>
                                    @foreach($PickupLocation as $item)
                                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('id_pickup_location', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <select name="id_model" class="form-control {{ $errors->has('id_model') ? 'is-invalid' : ''}}">
                                    <option selected disabled>Choose the model</option>
                                    @foreach($Manufacture as $item)
                                        <optgroup label="{{$item -> name}}">
                                        @foreach($VehicleType as $item2)
                                            @if($item2 -> id_manufacture == $item -> id)
                                                <option value="{{$item2 -> id}}">{{$item2 -> name}}</option>
                                            @endif
                                        @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                {!! $errors->first('id_model', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="number"
                                       class="form-control col-md-12 {{ $errors->has('daily_price') ? 'is-invalid' : ''}}"
                                       placeholder="Daily Price" name="daily_price">
                                {!! $errors->first('daily_price', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile03">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose the image for vehicle</label>
                                </div>
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
@endsection

@section('script')

@endsection

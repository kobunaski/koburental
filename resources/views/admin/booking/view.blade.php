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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Table</h4>
                        @if(session('alert'))
                            <div class="alert alert-success col-4">
                                {{session('alert')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Renter Name</th>
                                    <th>Staff Name</th>
                                    <th>Id - Vehicle name</th>
                                    <th>Pickup Date</th>
                                    <th>Return Date</th>
                                    <th>Pickup Location</th>
                                    <th>Booking Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Booking as $item)
                                    <tr>
                                        <td>
                                            {{$item -> id}}
                                        </td>
                                        <td>
                                            @foreach($User as $item2)
                                                @if($item2 -> id == $item -> id_user)
                                                    {{$item2 -> name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($User as $item2)
                                                @if($item2 -> id == $item -> id_staff)
                                                    {{$item2 -> name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($Vehicle as $item2)
                                                @if($item2 -> id == $item -> id_vehicle)
                                                    {{$item2 -> name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$item -> pickup_date}}</td>
                                        <td>{{$item -> return_date}}</td>
                                        <td>
                                            @foreach($PickupLocation as $item2)
                                                @if($item2 -> id == $item -> id_pickup_location)
                                                    {{$item2 -> name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        @switch($item -> status)
                                            @case(0)
                                            <td class="text-warning">
                                                Pending
                                            </td>
                                            @break
                                            @case(1)
                                            <td class="text-warning">
                                                Pending payment
                                            </td>
                                            @break
                                            @case(2)
                                            <td class="text-primary">
                                                Processing
                                            </td>
                                            @break
                                            @case(3)
                                            <td class="text-success">
                                                Completed
                                            </td>
                                            @break
                                            @case(4)
                                            <td class="text-danger">
                                                Declined
                                            </td>
                                            @break
                                        @endswitch
                                        <td>
                                            @if($item -> status == 0)
                                                <a href="order/decline/{{$Booking -> id}}">Decline</a>
                                                <a href="order/confirm/{{$Booking -> id}}">Confirm</a>
                                                @else
                                                Wait for customer
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <!--This page plugins -->
    <script src="admin_assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="admin_assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection

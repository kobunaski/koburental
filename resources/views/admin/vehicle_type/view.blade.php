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
                    <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
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
                        <h4 class="card-title">Vehicle type Table</h4>
                        <br>
                        <a href="admin/vehicle_type/add" class="btn btn-outline-primary">Add a new model</a>
                        <br>
                        <br>
                        @if(session('alert'))
                            <div class="alert alert-success col-4">
                                {{session('alert')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th>Type Name</th>
                                    <th>Manufacture name</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($VehicleType as $item)
                                    <tr>
                                        <td>{{$item -> name}}</td>
                                        @foreach($Manufacture as $item2)
                                            @if($item2 -> id == $item -> id_manufacture)
                                                <td>{{$item2 -> name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$item -> created_at}}</td>
                                        <td>
                                            <a href="admin/vehicle_type/edit/{{$item -> id}}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="admin/vehicle_type/delete/{{$item -> id}}" class="btn btn-sm btn-outline-danger">Delete</a>
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

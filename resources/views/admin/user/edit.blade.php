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
                        <h4 class="card-title">Add new user</h4>
                        <h6 class="card-subtitle">Remember to <code>input</code> every field</h6>
                        @if(session('notificate'))
                            <div class="alert alert-success">
                                {{session('notificate')}}
                            </div>
                        @endif
                        <form class="mt-4" action="admin/user/edit/{{$User -> id}}" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control col-md-12 {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                       placeholder="Full Name" name="name" value="{{$User -> name}}">
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="text"
                                       class="form-control col-md-12 {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                       placeholder="Email" name="email" value="{{$User -> email}}">
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="password"
                                       class="form-control col-md-12 {{ $errors->has('password') ? 'is-invalid' : ''}}"
                                       placeholder="Password" name="password" value="{{$User -> password}}">
                                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="text"
                                       class="form-control col-md-12 {{ $errors->has('address') ? 'is-invalid' : ''}}"
                                       placeholder="Address" name="address" value="{{$User -> address}}">
                                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="number"
                                       class="form-control col-md-12 {{ $errors->has('phone') ? 'is-invalid' : ''}}"
                                       placeholder="Phone Number" name="phone" value="{{$User -> phone}}">
                                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <select name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : ''}}">
                                    @if($User -> gender == 'f')
                                        <option value="none" disabled="">Select Gender
                                        </option>
                                        <option value="m">Male</option>
                                        <option value="f" selected="">Female</option>
                                    @else
                                        <option value="none" disabled="">Select Gender
                                        </option>
                                        <option value="m" selected="">Male</option>
                                        <option value="f">Female</option>
                                    @endif
                                </select>
                                {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : ''}}">
                                    <option selected disabled>Choose the role</option>
                                    @foreach($Role as $item)
                                        @if($item -> id == $User -> id_role)
                                            <option value="{{$item -> id}}"
                                                    selected>{{$item -> name}}</option>
                                        @else
                                            <option
                                                value={{$item -> id}}>{{$item -> name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <input type="date"
                                       class="form-control col-md-12 {{ $errors->has('date_of_birth') ? 'is-invalid' : ''}}"
                                       placeholder="Date of birth" name="date_of_birth" value="{{$User -> date_of_birth}}">
                                {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <img src="upload/image/user_image/{{$User -> image}}" alt="" style="width: 200px;height: auto">
                            
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile03">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose the image profile</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="admin/user/view" class="btn btn-dark">Cancel</a>
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

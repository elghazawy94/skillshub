@extends('admin.master')

@section('title')
Settings
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('admin.inc.message')

                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Settings Website</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url("dashboard/setting/update/$setting->id")}}">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" value="{{$setting->email}}" name="email" class="form-control" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" value="{{$setting->phone}}" name="phone" class="form-control" placeholder="Enter name category">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" value="{{$setting->facebook}}" name="facebook" class="form-control" placeholder="facebook links">
                        </div>

                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" value="{{$setting->twitter}}" name="twitter" class="form-control" placeholder="twitter links">
                        </div>

                        <div class="form-group">
                            <label>Instegram</label>
                            <input type="text" value="{{$setting->instegram}}" name="instegram" class="form-control" placeholder="instegram links">
                        </div>

                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" value="{{$setting->youtube}}" name="youtube" class="form-control" placeholder="youtube links">
                        </div>

                        <div class="form-group">
                            <label>Linked In</label>
                            <input type="text" value="{{$setting->linkedin}}" name="linkedin" class="form-control" placeholder="linkedin links">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection


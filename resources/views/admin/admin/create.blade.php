@extends('admin.master')

@section('title')
create user
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> create user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">create user</li>
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

                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">create user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url("dashboard/admins/create")}}">
                        @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>group</label>
                            <select class="custom-select rounded-0" name="groups">
                                <option></option>
                                @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name here">
                        </div>

                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email here">
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password here">
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password confirmation">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">create</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection


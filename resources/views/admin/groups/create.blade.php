@extends('admin.master')

@section('title')
create Group
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> create Group</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">create Group</li>
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

                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">create Group</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url("dashboard/groups/create")}}">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name here">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="custom-select rounded-0" name="role">
                                <option></option>
                                <option value="1">Is Admin</option>
                                <option value="0">Not Admin</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">create Group</button>
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


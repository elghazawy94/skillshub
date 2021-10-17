@extends('admin.master')

@section('title')
Admin list
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Admin list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Admin list</li>
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
                        <h3 class="card-title">Admin list</h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{ url("dashboard/admins/create")}}">
                                <i class="fas fa-plus"></i>
                                Create user
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>verified</th>
                                <th>Group</th>
                                <th>created at</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $admin->name }}
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @if ($admin->email_verified_at == NULL)
                                            <span class="badge bg-secondary">not verify</span>
                                        @else
                                            <span class="badge bg-success">verified</span>
                                        @endif
                                    </td>
                                    <td>{{$admin->role->name }}</td>
                                    <td>{{$admin->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{$admins->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

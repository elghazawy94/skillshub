@extends('admin.master')

@section('title')
messages
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/dashboard/')}}">Home</a></li>
                <li class="breadcrumb-item active"> Home Page</li>
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
                        <h3 class="card-title">last 10 Message</h3>

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>subject</th>
                            <th>name</th>
                            <th>email</th>
                            <th>created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $msg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$msg->subject ?? "..."}}</td>
                                <td>{{$msg->name}}</td>
                                <td>{{$msg->email}}</td>
                                <td>{{$msg->created_at}}</td>
                                <td class="project-actions text-right">
                                    <a href="{{url("/dashboard/messages/show/$msg->id")}}" class="btn btn-primary btn-sm" >
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{url("/dashboard/messages/delete/$msg->id")}}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{$messages->links()}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection



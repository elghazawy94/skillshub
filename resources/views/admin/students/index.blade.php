@extends('admin.master')

@section('title')
    Students List
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Exams</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Exams</li>
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
                        <h3 class="card-title">Students list</h3>
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
                                <th>created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $student->name }}
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        @if ($student->email_verified_at == NULL)
                                            <span class="badge bg-secondary">not verify</span>
                                        @else
                                            <span class="badge bg-success">verified</span>
                                        @endif
                                    </td>
                                    <td>{{$student->created_at}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ url("/dashboard/students/show/$student->id")}}">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </a>
                                        <a href="{{ url("dashboard/students/edit/$student->id")}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{url("/dashboard/students/delete/$student->id")}}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{$students->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

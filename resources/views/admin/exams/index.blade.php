@extends('admin.master')

@section('title')
Exams
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Students</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Students</li>
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
                        <h3 class="card-title">Exams list</h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{ url("dashboard/exams/create")}}">
                                <i class="fas fa-plus"></i>
                                Create new Exam
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>name (en)</th>
                                <th>name (ar)</th>
                                <th>Skill</th>
                                <th>questions</th>
                                <th>Status</th>
                                <th>created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset("/uploads/$exam->img")}}" class="img-circle mr-2" style="height: 40px;width: 40px;">
                                        {{ json_decode($exam->name)->en }}
                                    </td>
                                    <td>{{ json_decode($exam->name)->ar }}</td>
                                    <td>{{ json_decode($exam->skill->name)->en }}</td>
                                    <td>{{ $exam->questions_num }}</td>
                                    <td>
                                        @if ($exam->active == 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Disable</span>
                                        @endif
                                    </td>
                                    <td>{{$exam->created_at}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-warning btn-sm" href="{{ url("/dashboard/exams/show/$exam->id/questions")}}">
                                            <i class="fas fa-question"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ url("/dashboard/exams/show/$exam->id")}}">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </a>
                                        <a href="{{ url("dashboard/exams/edit/$exam->id")}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{url("/dashboard/exams/delete/$exam->id")}}">
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
                {{$exams->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection


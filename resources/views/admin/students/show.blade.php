@extends('admin.master')

@section('title')
    show student
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
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/img/user-profile.jpg')}}">
                            </div>
                            <h3 class="profile-username text-center">{{$showUser->name}}</h3>
                            <p class="text-muted text-center">{{$showUser->role->name}}</p>
                            {{-- <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Exams</b> <a class="float-right">{{$showUser->exams->count()}}</a>
                                </li>
                            </ul> --}}
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> Email</strong>
                            <p class="text-muted">{{$showUser->email}}</p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> status</strong>
                            <p class="text-muted">
                                @if ($showUser->email_verified_at == NULL)
                                    <span class="badge bg-secondary">not verify</span>
                                @else
                                    <span class="badge bg-success">verified</span>
                                @endif
                            </p>
                            <hr>
                            <strong><i class="fas fas fa-clipboard mr-1"></i> Exams</strong>
                            <p class="text-muted">Count : <span class="text-danger">{{$showUser->exams->count()}}</span></p>
                            <hr>
                            <strong><i class="far fa-clock"></i> created at	</strong>
                            <p class="text-muted">{{$showUser->created_at}}</p>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->

                <div class="col-md-9">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student Exams</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>score</th>
                                    <th>time (mins)</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($StudentExams as $exam)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ json_decode($exam->name)->en }}</td>
                                        <td>{{ $exam->pivot->score}}</td>
                                        <td>{{ $exam->pivot->time_mins}}</td>
                                        <td>
                                            @if ($exam->pivot->status == 'opend')
                                            <span class="badge bg-success">opend</span>
                                            @else
                                            <span class="badge bg-secondary">closed</span>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            @if ($exam->pivot->status == 'closed')
                                                <a href="{{ url("dashboard/students/open/$showUser->id/$exam->id")}}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-lock-open"></i> Open Exam
                                                </a>
                                            @else
                                            <a href="{{ url("dashboard/students/close/$showUser->id/$exam->id")}}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-lock-open"></i> close Exam
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

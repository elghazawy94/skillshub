@extends('admin.master')

@section('title')
show exam
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> {{ json_decode($exam->name)->en }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/exams')}}">Exam</a></li>
            <li class="breadcrumb-item active">{{ json_decode($exam->name)->en }}</li>
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




                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title"> Exam Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Questions</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$exam->questions_num}}</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Difficulty</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$exam->difficulty}}</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Durations</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$exam->durations_mins}} .min</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <h4>Description (en)</h4>
                                <div class="post">
                                    <p>{{ json_decode($exam->desc)->en }}</p>
                                </div>

                            <h4>Description (ar)</h4>
                                <div class="post clearfix">
                                    <p>{{ json_decode($exam->desc)->ar }}</p>
                                </div>



                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-clipboard-list"></i> {{ json_decode($exam->name)->en }}</h3>

                        <img class="img-fluid border-2 my-2" src="{{ asset("/uploads/$exam->img")}}" alt="">
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">name (en)
                            <b class="d-block">{{ json_decode($exam->name)->en }}</b>
                            </p>
                            <p class="text-sm">name(ar)
                            <b class="d-block">{{ json_decode($exam->name)->ar }}</b>
                            </p>
                        </div>

                        <h5 class="mt-5 text-muted">exam info</h5>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fas fa-angle-double-right"></i>
                                Skill: <b>{{ json_decode($exam->skill->name)->en }}</b>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right"></i>
                                @if ($exam->active == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Disable</span>
                                @endif
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right"></i>
                                created at: <b>{{$exam->created_at}}</b>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right"></i>
                                updated at: <b>{{$exam->updated_at}}</b>
                            </li>
                        </ul>
                        <div class="text-center mt-5 mb-3">
                            <a href="{{ url()->previous()}}" class="btn btn-sm btn-primary">back</a>
                            <a href="{{ url("/dashboard/exams/show/$exam->id/questions")}}" class="btn btn-sm btn-warning">view Questions</a>
                        </div>
                        </div>
                    </div>
                    </div>
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


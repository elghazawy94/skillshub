@extends('admin.master')

@section('title')
create a new exam
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> STEP 2 : Create qeustions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/exams')}}">Exams</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("dashboard/exams/show/$exam->name")}}">{{ json_decode($exam->name)->en }}</a></li>
                        <li class="breadcrumb-item active">Create Questions</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <form method="POST" action="{{ url("/dashboard/exams/{$exam->id}/questions/store") }}" enctype="multipart/form-data">
                    @csrf
                    @for ($i = 1; $i <= $exam->questions_num; $i++)
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Questin <span class="badge badge-danger">{{$i}}</span></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="title for the question" name="titles[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Right Answer</label>
                                            <select class="custom-select rounded-0" name="right_answer[]">
                                                <option value=""></option>
                                                <option value="1"> option 1</option>
                                                <option value="2"> option 2</option>
                                                <option value="3"> option 3</option>
                                                <option value="4"> option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" class="form-control" name="option_1s[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" class="form-control" name="option_2s[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" class="form-control" name="option_3s[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" class="form-control" name="option_4s[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    @endfor
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">create Question</button>
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

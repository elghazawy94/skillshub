@extends('admin.master')

@section('title')
Edit: {{ json_decode($exam->name)->en }}
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit: {{ json_decode($exam->name)->en }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/exams')}}">Exams</a></li>
            <li class="breadcrumb-item active"> {{ json_decode($exam->name)->en }}</li>
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
            <div class="col-md-12 p-3">

                @include('admin.inc.message')

                    <div class="card-body">
                        <form method="POST" action="{{ url("dashboard/exams/update/$exam->id")}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name (en)</label>
                                        <input type="text" class="form-control" value="{{ json_decode($exam->name)->en }}" name="name_en">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name (ar)</label>
                                        <input type="text" class="form-control" value="{{ json_decode($exam->name)->ar }}" name="name_ar">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group">
                                <label>Description (en)</label>
                                <textarea class="form-control" name="desc_en" rows="5">{{ json_decode($exam->desc)->en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description (ar)</label>
                                <textarea class="form-control" name="desc_ar" rows="5">{{ json_decode($exam->desc)->ar }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skill</label>
                                        <select class="custom-select rounded-0" name="skill_id">
                                            @foreach ($skills as $skill)
                                            <option value="{{$skill->id}}" @if ($exam->skill_id == $skill->id) selected @endif>{{ json_decode($skill->name)->en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Questions no.</label>
                                        <input type="text" class="form-control" value="{{$exam->questions_num}}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Difficulty</label>
                                        <select class="custom-select rounded-0" name="difficulty">
                                            <option value="1" @if ($exam->difficulty == 1) selected @endif >1</option>
                                            <option value="2" @if ($exam->difficulty == 2) selected @endif >2</option>
                                            <option value="3" @if ($exam->difficulty == 3) selected @endif >3</option>
                                            <option value="4" @if ($exam->difficulty == 4) selected @endif >4</option>
                                            <option value="5" @if ($exam->difficulty == 5) selected @endif >5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Durations (mins.)</label>
                                        <input type="number" value="{{$exam->durations_mins}}" class="form-control" name="durations_mins">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Edite exam</button>
                                <a href="{{url()->previous()}}" class="btn btn-primary">back</a>
                            </div>
                    </form>
                    </div>
                    <!-- /.card-body -->





            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




@endsection


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
            <h1 class="m-0 text-dark"> STEP 1 : Create Exam</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/exams')}}">Exams</a></li>
            <li class="breadcrumb-item active"> Create</li>
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
                        <form method="POST" action="{{ url('dashboard/exams/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name (en)</label>
                                        <input type="text" value="{{old('name_en')}}" class="form-control" name="name_en">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name (ar)</label>
                                        <input type="text" value="{{old('name_ar')}}" class="form-control" name="name_ar">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group">
                                <label>Description (en)</label>
                                <textarea class="form-control" name="desc_en" rows="5">{{old('desc_en')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description (ar)</label>
                                <textarea class="form-control" name="desc_ar" rows="5">{{old('desc_ar')}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skill</label>
                                        <select class="custom-select rounded-0" name="skill_id">
                                            <option></option>
                                            @foreach ($skills as $skill)
                                            <option value="{{$skill->id}}">{{ json_decode($skill->name)->en }}</option>
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
                                        <input type="number" value="{{old('questions_num')}}" class="form-control" name="questions_num">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Difficulty</label>
                                        <select class="custom-select rounded-0" name="difficulty">
                                            <option></option>
                                            <option value="1">Low</option>
                                            <option value="2">Easy</option>
                                            <option value="3">Normal</option>
                                            <option value="4">Hard</option>
                                            <option value="5">Very Hard</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Durations (mins.)</label>
                                        <input type="number" value="{{old('durations_mins')}}" class="form-control" name="durations_mins">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">create exam</button>
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


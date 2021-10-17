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
            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams')}}">Exam</a></li>
            <li class="breadcrumb-item"><a href="{{ url("dashboard/exams/show/$exam->id")}}">{{ json_decode($exam->name)->en }}</a></li>
            <li class="breadcrumb-item active">Questions</li>
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


                @foreach ($exam->questions as $question)
                <!-- Default box -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><span class="badge badge-danger">{{$loop->iteration}}</span> <strong><span class="text-primary">Questin</span>: {{$question->title}}</strong></h3>
                        <div class="card-tools">
                            <a class="btn btn-warning btn-sm edit-btn" href="#" data-id="{{$question->id}}" data-title="{{$question->title}}" data-option-1="{{$question->option_1}}" data-option-2="{{$question->option_2}}" data-option-3="{{$question->option_3}}"  data-option-4="{{$question->option_4}}" data-right-answer="{{$question->right_answer}}" data-toggle="modal" data-target="#update-questions-modal">
                                <i class="fas fa-pencil-alt"></i>
                                Edite Question
                            </a>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Option 1</label>
                                    <input type="text" value="{{$question->option_1}}" class="form-control @if ($question->right_answer == 1) is-valid @else is-invalid @endif" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Option 2</label>
                                    <input type="text" value="{{$question->option_2}}" class="form-control @if ($question->right_answer == 2) is-valid @else is-invalid @endif" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Option 3</label>
                                    <input type="text" value="{{$question->option_3}}" class="form-control @if ($question->right_answer == 3) is-valid @else is-invalid @endif" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Option 4</label>
                                    <input type="text" value="{{$question->option_4}}" class="form-control @if ($question->right_answer == 4) is-valid @else is-invalid @endif" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @endforeach





            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.model update -->
<div class="modal fade" id="update-questions-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('dashboard/exams/questions/update')}}" id="update-questions-form">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>title</label>
                                <input type="text" name="title" id="edit-form-title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Right Answer</label>
                                <select class="custom-select rounded-0" name="right_answer" id="edit-form-right-answer">
                                    <option value=""></option>
                                    <option value="1"> option 1</option>
                                    <option value="2"> option 2</option>
                                    <option value="3"> option 3</option>
                                    <option value="4"> option 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Option 1</label>
                        <input type="text" name="option_1" id="edit-form-option-1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Option 2</label>
                        <input type="text" name="option_2" id="edit-form-option-2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Option 3</label>
                        <input type="text" name="option_3" id="edit-form-option-3" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Option 4</label>
                        <input type="text" name="option_4" id="edit-form-option-4" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="update-questions-form" type="submit" class="btn btn-primary">update</button>
            </div>
        </div>
    </div>
</div>
<!-- /. End model update -->
@endsection

@section('scripts')
    <script>
        $('.edit-btn').click(function () {
            let id = $(this).attr('data-id');
            let title = $(this).attr('data-title');
            let option1 = $(this).attr('data-option-1');
            let option2 = $(this).attr('data-option-2');
            let option3 = $(this).attr('data-option-3');
            let option4 = $(this).attr('data-option-4');
            let rightAnswer = $(this).attr('data-right-answer');


            $('#edit-form-id').val(id);
            $('#edit-form-title').val(title);
            $('#edit-form-option-1').val(option1);
            $('#edit-form-option-2').val(option2);
            $('#edit-form-option-3').val(option3);
            $('#edit-form-option-4').val(option4);
            $('#edit-form-right-answer').val(rightAnswer);
        });
    </script>
@endsection

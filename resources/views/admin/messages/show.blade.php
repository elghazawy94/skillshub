@extends('admin.master')

@section('title')
    Dashboard messages
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


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    message
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-md">
                    <tbody>
                        <tr>
                            <th>name</th>
                            <td>{{$message->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$message->email}}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{$message->subject ?? "..."}}</td>
                        </tr>
                        <tr class="card-footer">
                            <th>body</th>
                            <td>{{$message->body}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <div class="row">
            <div class="col-md-12">

                @include('admin.inc.message')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Send response</h3>
                    </div>
                    <form  method="POST" action="{{url("/dashboard/messages/response/$message->id")}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>message body</label>
                                <textarea class="form-control" name="body" rows="5"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<!-- /.model update -->
<div class="modal fade" id="view-message-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">view message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label>subject</label>
                        <input type="text" id="view-message-subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>message body</label>
                        <textarea class="form-control" id="view-message-body" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /. End model update -->
@endsection


@section('scripts')
    <script>
        $('.view-message').click(function () {
            let id = $(this).attr('data-id');
            let subject = $(this).attr('data-subject');
            let body = $(this).attr('data-body');
            $('#view-message-id').val(id);
            $('#view-message-subject').val(subject);
            $('#view-message-body').val(body);
        });
    </script>
@endsection

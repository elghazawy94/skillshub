@extends('admin.master')

@section('title')
    categories
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">categories</li>
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
                        <h3 class="card-title">Category list</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-category-modal">
                                Create new category
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name (en)</th>
                            <th>name (ar)</th>
                            <th>Status</th>
                            <th>created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ json_decode($cat->name)->en }}</td>
                                <td>{{ json_decode($cat->name)->ar }}</td>
                                <td>
                                    @if ($cat->active == 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-secondary">Disable</span>
                                    @endif
                                </td>
                                <td>{{$cat->created_at}}</td>
                                <td class="project-actions text-right">

                                    <a href="#" class="btn btn-info btn-sm edit-btn" data-id="{{$cat->id}}" data-name-en="{{ json_decode($cat->name)->en }}" data-name-ar="{{ json_decode($cat->name)->ar }}" data-toggle="modal" data-target="#update-category-modal">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{url("/dashboard/categories/delete/$cat->id")}}">
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
                {{$categories->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.model add -->
<div class="modal fade" id="add-category-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create a new Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('dashboard/categories/store')}}" id="add-category-form">
                    @csrf
                    <div class="form-group">
                        <label>Name (en)</label>
                        <input type="text" name="name_en" class="form-control" placeholder="Enter name category">
                    </div>
                    <div class="form-group">
                        <label>Name (ar)</label>
                        <input type="text" name="name_ar" class="form-control" placeholder="Enter name category">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="add-category-form" type="submit" class="btn btn-primary">create</button>
            </div>
        </div>
    </div>
</div>
<!-- /. End model add -->


<!-- /.model update -->
<div class="modal fade" id="update-category-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('dashboard/categories/update')}}" id="update-category-form">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">
                    <div class="form-group">
                        <label>Name (en)</label>
                        <input type="text" name="name_en" id="edit-form-name-en" class="form-control" placeholder="Enter name category">
                    </div>
                    <div class="form-group">
                        <label>Name (ar)</label>
                        <input type="text" name="name_ar" id="edit-form-name-ar" class="form-control" placeholder="Enter name category">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="update-category-form" type="submit" class="btn btn-primary">update</button>
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
            let nameEn = $(this).attr('data-name-en');
            let nameAr = $(this).attr('data-name-ar');
            $('#edit-form-id').val(id);
            $('#edit-form-name-en').val(nameEn);
            $('#edit-form-name-ar').val(nameAr);
        });
    </script>
@endsection

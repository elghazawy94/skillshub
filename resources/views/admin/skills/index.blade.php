@extends('admin.master')

@section('title')
skills
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> skills</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">skills</li>
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
                        <h3 class="card-title">skills list</h3>


                        <div class="card-tools">
                            {{-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-plus"></i>
                                Create new category
                            </a> --}}
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-skill-modal">
                                Create new skill
                            </button>
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
                            <th>category</th>
                            <th>Status</th>
                            <th>created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset("/uploads/$skill->img")}}" class="img-circle mr-2" style="height: 40px;width: 40px;">
                                    {{ json_decode($skill->name)->en }}
                                </td>
                                <td>{{ json_decode($skill->name)->ar }}</td>
                                <td>{{ json_decode($skill->category->name)->en }}</td>
                                <td>
                                    @if ($skill->active == 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-secondary">Disable</span>
                                    @endif
                                </td>
                                <td>{{$skill->created_at}}</td>
                                <td class="project-actions text-right">
                                    <a href="#" class="btn btn-info btn-sm edit-btn" data-id="{{$skill->id}}" data-name-en="{{ json_decode($skill->name)->en }}" data-name-ar="{{ json_decode($skill->name)->ar }}" data-cat-id="{{$skill->category_id}}" data-toggle="modal" data-target="#update-skill-modal">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{url("/dashboard/skills/delete/$skill->id")}}">
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
                {{$skills->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.model add -->
<div class="modal fade" id="add-skill-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create a new skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('dashboard/skills/store')}}" id="add-skill-form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name (en)</label>
                        <input type="text" name="name_en" class="form-control" placeholder="Enter name skill">
                    </div>
                    <div class="form-group">
                        <label>Name (ar)</label>
                        <input type="text" name="name_ar" class="form-control" placeholder="Enter name skill">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="custom-select rounded-0" name="cat_id">
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{ json_decode($cat->name)->en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="add-skill-form" type="submit" class="btn btn-primary">create</button>
            </div>
        </div>
    </div>
</div>
<!-- /. End model add -->


<!-- /.model update -->
<div class="modal fade" id="update-skill-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('dashboard/skills/update')}}" id="update-skill-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">
                    <div class="form-group">
                        <label>Name (en)</label>
                        <input type="text" name="name_en" id="edit-form-name-en" class="form-control" placeholder="Enter name skill">
                    </div>
                    <div class="form-group">
                        <label>Name (ar)</label>
                        <input type="text" name="name_ar" id="edit-form-name-ar" class="form-control" placeholder="Enter name skill">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="custom-select rounded-0" id="edit-form-cat-id" name="cat_id">
                            @foreach ($categories_edit as $cat)
                                <option value="{{$cat->id}}">{{ json_decode($cat->name)->en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="update-skill-form" type="submit" class="btn btn-primary">update</button>
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
            let img = $(this).attr('data-img');
            let catId = $(this).attr('data-cat-id');
            $('#edit-form-id').val(id);
            $('#edit-form-name-en').val(nameEn);
            $('#edit-form-name-ar').val(nameAr);
            $('#edit-form-cat-id').val(catId);
        });
    </script>
@endsection

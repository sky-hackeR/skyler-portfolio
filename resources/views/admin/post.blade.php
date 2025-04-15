@extends('admin.layout.dashboard')

@section('content')



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Blog Posts</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Blog Posts</li>
                </ol>
            </div>
    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Create A Blog Post</h4>
                <form action="{{ url('/admin/addPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="floatingTitleInput" placeholder="Enter title">
                        <label for="floatingTitleInput">Title</label>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="image">Blog Post Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="content">Blog Post Body</label>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection    
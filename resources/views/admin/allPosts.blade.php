@extends('admin.layout.dashboard')

@section('content')

<!-- TinyMCE Script -->
<script src="https://cdn.tiny.cloud/1/ib771jqvt5joab026vosdy4bkhoad3hty1tycnv696zoka2w/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>

<!-- Start Page Title -->
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
<hr>

<!-- Add New Blog Post Button -->
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex align-items-center">
            <div class="ms-3 flex-grow-1"></div>
            <div>
                <a href="{{ url('/admin/post') }}" class="btn btn-primary"><i class="bx bx-plus align-middle"></i> Add New Blog Post</a>
            </div>
        </div>
    </div>
</div>

<!-- Blog Post List -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog Post List</h4>
                <hr>
                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $post->image }}" alt="{{ $post->title }}" width="50"></td>
                        <td>{{ $post->title }}</td>
                        <td>{!! strlen($post->content) > 150 ? substr($post->content, 0, 50) . '...' : $post->content !!}</td>
                        
                        <td>
                            <div class="text-end">
                                <!-- View Button -->
                                <a class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#viewBlogPost{{ $post->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Edit Button -->
                                <a class="btn btn-outline-primary btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editBlogPost{{ $post->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- Delete Button -->
                                <a class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteBlogPost{{ $post->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>

                            <!-- View Blog Post Modal -->
                            <div class="modal fade" id="viewBlogPost{{ $post->id }}" tabindex="-1" aria-labelledby="viewBlogPostLabel{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewBlogPostLabel{{ $post->id }}">View Blog Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 400px; width: auto; height: auto;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $post->title }}</h5>
                                                    <p class="card-text" style="white-space: pre-wrap;">{{ strip_tags($post->content) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Blog Post Modal -->
                            <div class="modal fade" id="deleteBlogPost{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteBlogPostLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ url('/admin/deletePost') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="modal-body">
                                                <p class="text-center"> Are you sure you want to delete "{{ $post->title }}"?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Blog Post Modal -->
                            <div class="modal fade" id="editBlogPost{{ $post->id }}" tabindex="-1" aria-labelledby="editBlogPostLabel{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editBlogPostLabel{{ $post->id }}">Edit Blog Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/editPost') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingTitleInput" name="title" placeholder="Enter Title" value="{{ $post->title }}">
                                                            <label for="floatingTitleInput">Title</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="image">Blog Post Image</label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contentInput" class="form-label">Content</label>
                                                    <textarea class="form-control tinymce-editor" id="contentInput" name="content" placeholder="Enter Content" style="height: 100px">{{ $post->content }}</textarea>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md float-end">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit Blog Post Modal -->
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout.dashboard')

@section('content')
<script src="https://cdn.tiny.cloud/1/b9d45cy4rlld8ypwkzb6yfzdza63fznxtcoc3iyit61r4rv9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    
    function setAboutContent(title, content) {
        document.getElementById('title').value = title;
        tinymce.get('about').setContent(content);
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.edit').addEventListener('click', function () {
        var aboutTitle = this.getAttribute('data-about-title');
        var aboutContent = this.getAttribute('data-about-content');
        setAboutContent(aboutTitle, aboutContent);
        });
    });
</script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">About</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"> Type About Statement</h4>
                <form action="{{ url('/admin/updateAbout') }}" method="POST"> 
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="body">About Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="body">About Statement</label>
                                <textarea name="about" class="form-control" id="about" cols="30" rows="10">   </textarea>
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
    <div class="col-lg-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-4">Current About Title and Statement</h5>
                    <button class="btn btn-outline-success edit" title="Edit" data-about-title="{{ $about->title }}" data-about-content="{!! !empty($about) ? htmlspecialchars($about->about) : '' !!}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    @if($about)
                        <div class="mb-3">
                            <h6>Title</h6>
                            <p>{!! $about->title !!}</p>
                        </div>
                        <br>
                        <hr>
                        <div class="mb-3">
                            <h6>About Statement</h6>
                            <p>{!! $about->about !!}</p>
                        </div>
                    @else
                        <p class="text-center">No About information available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- end row -->

@endsection
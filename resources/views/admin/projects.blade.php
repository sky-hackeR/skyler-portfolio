@extends('admin.layout.dashboard')

@section('content')

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/ib771jqvt5joab026vosdy4bkhoad3hty1tycnv696zoka2w/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Project</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Add New Project</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Details Form</h5>
                <p class="card-title-desc">Enter the details of the project below.</p>

                <form action="{{ url('/admin/addProject') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingTitleInput" name="title" placeholder="Enter Title">
                                <label for="floatingTitleInput">Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingClientInput" name="client" placeholder="Enter Client">
                                <label for="floatingClientInput">Client</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingYearInput" name="year" placeholder="Enter Year">
                                <label for="floatingYearInput">Year</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingServicesInput" name="services" aria-label="Select Services">
                                    <option selected disabled>Select a Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->title }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingServicesInput">Services</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingProjectTypeInput" name="project_type" placeholder="Enter Project Type">
                                <label for="floatingProjectTypeInput">Project Type</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea class="form-control tinymce-editor" id="descriptionInput" name="description" placeholder="Enter Description" style="height: 100px"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="aboutProjectInput" class="form-label">About Project</label>
                        <textarea class="form-control tinymce-editor" id="aboutProjectInput" name="about_project" placeholder="Enter About Project" style="height: 100px"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="aboutClientInput" class="form-label">About Client</label>
                        <textarea class="form-control tinymce-editor" id="aboutClientInput" name="about_client" placeholder="Enter About Client" style="height: 100px"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md float-end">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

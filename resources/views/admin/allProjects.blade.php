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
            <h4 class="mb-sm-0 font-size-18">Projects</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex align-items-center">
            <div class="ms-3 flex-grow-1">
                
            </div>
            <div>
                <a href="{{ url('/admin/projects') }}" class="btn btn-primary"><i class="bx bx-plus align-middle"></i> Add New Project</a>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Project List</h4>
                <hr>

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Client</th>
                        <th>Year</th>
                        <th>Services</th>
                        <th>Project Type</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->year }}</td>
                        <td>{{ $project->services }}</td>
                        <td>{{ $project->project_type }}</td>
                        <td>{!! strlen($project->description) > 70 ? substr($project->description, 0, 50) . '...' : $project->description !!}</td>
                        <td>
                            <div class="text-end">

                                <a class="btn btn-outline-primary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editProject{{ $project->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> 

    
                                <a class="btn btn-outline-danger btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteProject{{ $project->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
    
                            <!-- Static Backdrop Modal -->
                            <div class="modal fade" id="deleteProject{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteProject" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    
                                        <form action="{{ url('/admin/deleteProject') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                                            <div class="modal-body">
                                                <p class="text-center"> Are you sure you want to delete "{{ $project->title }}"?</p>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Project Modal -->
                            <div class="modal fade" id="editProject{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectLabel{{ $project->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProjectLabel{{ $project->id }}">Edit Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/editProject') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingTitleInput" name="title" placeholder="Enter Title" value="{{ $project->title }}">
                                                            <label for="floatingTitleInput">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingClientInput" name="client" placeholder="Enter Client" value="{{ $project->client }}">
                                                            <label for="floatingClientInput">Client</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" id="floatingYearInput" name="year" placeholder="Enter Year" value="{{ $project->year }}">
                                                            <label for="floatingYearInput">Year</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingServicesInput" name="services" placeholder="Enter Services" value="{{ $project->services }}">
                                                            <label for="floatingServicesInput">Services</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingProjectTypeInput" name="project_type" placeholder="Enter Project Type" value="{{ $project->project_type }}">
                                                            <label for="floatingProjectTypeInput">Project Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <label for="descriptionInput" class="form-label">Description</label>
                                                    <textarea class="form-control tinymce-editor" id="descriptionInput" name="description" placeholder="Enter Description" style="height: 100px">{!! $project->description !!}</textarea>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <label for="aboutProjectInput" class="form-label">About Project</label>
                                                    <textarea class="form-control tinymce-editor" id="aboutProjectInput" name="about_project" placeholder="Enter About Project" style="height: 100px">{!! $project->about_project !!}</textarea>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <label for="aboutClientInput" class="form-label">About Client</label>
                                                    <textarea class="form-control tinymce-editor" id="aboutClientInput" name="about_client" placeholder="Enter About Client" style="height: 100px">{!! $project->about_client !!}</textarea>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md float-end">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit Project Modal -->
    
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

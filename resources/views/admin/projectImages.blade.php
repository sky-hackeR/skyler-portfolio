@extends('admin.layout.dashboard')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Project Images</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Project Images</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add New Image</h5>
                <p class="card-title-desc">Enter details for the new image</p>

                <form action="{{ url('/admin/addProjectImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_id" id="project_id" aria-label="Select Project" required>
                            <option value="" selected>Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
                        <label for="project_id">Project</label>
                    </div>                    

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="image" name="image" required>
                        <label for="image">Image</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md float-end">Save</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Project Images List</h5>
                @foreach($images->groupBy('project_id') as $projectId => $projectImages)
                    <div class="accordion mb-3" id="accordion{{$projectId}}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                @foreach($projectImages->take(1) as $image)
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$projectId}}" aria-expanded="true" aria-controls="collapse{{$projectId}}">
                                        {{-- Project ID: {{$projectId}} --}}
                                        {{ $image->project->title }}
                                    </button>
                                @endforeach
                            </h2>
                            <div id="collapse{{$projectId}}" class="accordion-collapse collapse" aria-labelledby="heading{{$projectId}}" data-bs-parent="#accordion{{$projectId}}">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <tbody>
                                                @foreach($projectImages as $image)
                                                    <tr> 
                                                        <td>
                                                            <h5 class="text-truncate font-size-14 m-0">
                                                                <a href="javascript: void(0);" class="text-dark">{{ $image->project->title }}</a>
                                                            </h5>
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset($image->image) }}" alt="Project Image" class="img-thumbnail" width="100">
                                                        </td>
                                                        <td>
                                                            <div class="text-end">
                                                                <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteImage{{ $image->id }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
    
                                                                <!-- Static Backdrop Modal for Delete -->
                                                                <div class="modal fade" id="deleteImage{{ $image->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteImage" aria-hidden="true">
                                                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <form action="{{ url('/admin/deleteProjectImage') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="project_id" value="{{ $image->id }}">
                                                                                <div class="modal-body">
                                                                                    <p class="text-center"> Are you sure you want to delete this image?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

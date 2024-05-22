@extends('admin.layout.dashboard')

@section('content')

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/ib771jqvt5joab026vosdy4bkhoad3hty1tycnv696zoka2w/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

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
                <h4 class="mb-sm-0 font-size-18">Service</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Service</h5>
                    <p class="card-title-desc">Add Service Information</p>

                    <form action="{{ url('/admin/addService') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                            <label for="title">Title</label>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" style="height: 100px"></textarea>
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
                    <h5 class="card-title mb-4">Service Information </h5>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $service->title }}</a></h5>
                                        </td>
                                        <td>
                                            <div class="text-end">
                                                <span class="font-size-11">{!! $service->description !!}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-end">
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editServiceInfo{{ $service->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
    
                                                <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteServiceInfo{{ $service->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <!-- Edit Service Info Modal -->
                                                <div class="modal fade" id="editServiceInfo{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editServiceInfo" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editServiceInfo">Edit Service Information</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ url('/admin/editService') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title</label>
                                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Description</label>
                                                                        <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <!-- Delete Service Info Modal -->
                                                <div class="modal fade" id="deleteServiceInfo{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteServiceInfo" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteServiceInfo">Delete Service Information</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ url('/admin/deleteService') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete the service information?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
                <!-- end card body -->
            </div>
        </div>
    </div>
@endsection

@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Education</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Education</li>
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
                <a href="javascript:void(0);" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addEducation"><i class="bx bx-plus align-middle"></i> Add Education</a>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

<!-- Static Backdrop Modal -->
<div class="modal fade" id="addEducation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addEducationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEducationLabel">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ url('/admin/addEducation') }}" method="POST" >
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="start_year" name="start_year" placeholder="Enter Start Year">
                        <label for="start_year">Start Year</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="end_year" name="end_year" placeholder="Enter End Year">
                        <label for="end_year">End Year</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter Degree">
                        <label for="degree">Degree</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="school" name="school" placeholder="Enter School">
                        <label for="school">School</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="description" class="form-control" id="description" cols="35" rows="5"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Education</h4>
                <hr>

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>School</th>
                            <th>Degree</th>
                            <th>Start Year</th>
                            <th>End Year</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($education as $edu)
                        <tr>
                            <td>{{ $edu->school }}</td>
                            <td>{{ $edu->degree }}</td>
                            <td>{{ $edu->start_year }}</td>
                            <td>{{ $edu->end_year }}</td>
                            <td>{!! strlen($edu->description) > 50 ? substr($edu->description, 0, 50) . '...' : $edu->description !!}</td>
                            <td>
                                <div class="text-end">
                                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editEducation{{ $edu->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> 

                                    <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteEducation{{ $edu->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>

                                <!-- Static Backdrop Modal -->
                                <div class="modal fade" id="deleteEducation{{ $edu->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteEducation" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        
                                            <form action="{{ url('/admin/deleteEducation') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="edu_id" value="{{ $edu->id }}">
                                                <div class="modal-body">
                                                    <p class="text-center"> Are you sure you want to delete this education entry?</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- Static Backdrop Modal -->
                                <div class="modal fade" id="editEducation{{ $edu->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editEducation" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Education</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ url("/admin/editEducation") }}" method="post">
                                                @csrf
                                                <input type="hidden" name="edu_id" value="{{ $edu->id }}">

                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="start_year" name="start_year" placeholder="Enter Start Year" value="{{ $edu->start_year }}">
                                                        <label for="start_year">Start Year</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="end_year" name="end_year" placeholder="Enter End Year" value="{{ $edu->end_year }}">
                                                        <label for="end_year">End Year</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter Degree" value="{{ $edu->degree }}">
                                                        <label for="degree">Degree</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="school" name="school" placeholder="Enter School" value="{{ $edu->school }}">
                                                        <label for="school">School</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea name="description" class="form-control" id="description" cols="35" rows="5">{{ $edu->description }}</textarea>
                                                        <label for="description">Description</label>
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection

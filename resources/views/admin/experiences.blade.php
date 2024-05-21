@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Experience</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Experience</li>
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
                <a href="javascript:void(0);" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addExperience"><i class="bx bx-plus align-middle"></i> Add Experience</a>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

<!-- Static Backdrop Modal -->
<div class="modal fade" id="addExperience" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addExperienceLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExperienceLabel">Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ url('/admin/addExperience') }}" method="POST" >
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
                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position">
                        <label for="position">Position</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company">
                        <label for="company">Company</label>
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

                <h4 class="card-title">Experience</h4>
                <hr>

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Start Year</th>
                            <th>End Year</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($experience as $exp)
                        <tr>
                            <td>{{ $exp->company }}</td>
                            <td>{{ $exp->position }}</td>
                            <td>{{ $exp->start_year }}</td>
                            <td>{{ $exp->end_year }}</td>
                            <td>{{ $exp->description }}</td>
                            <td>
                                <div class="text-end">
                                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editExperience{{ $exp->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> 

                                    <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteExperience{{ $exp->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>

                                <!-- Static Backdrop Modal -->
                                <div class="modal fade" id="deleteExperience{{ $exp->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteExperience" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        
                                            <form action="{{ url('/admin/deleteExperience') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="exp_id" value="{{ $exp->id }}">
                                                <div class="modal-body">
                                                    <p class="text-center"> Are you sure you want to delete this experience entry?</p>
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
                                <div class="modal fade" id="editExperience{{ $exp->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editExperience" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Experience</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ url("/admin/editExperience") }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="exp_id" value="{{ $exp->id }}">

                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="start_year" name="start_year" placeholder="Enter Start Year" value="{{ $exp->start_year }}">
                                                        <label for="start_year">Start Year</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="end_year" name="end_year" placeholder="Enter End Year" value="{{ $exp->end_year }}">
                                                        <label for="end_year">End Year</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" value="{{ $exp->position }}">
                                                        <label for="position">Position</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company" value="{{ $exp->company }}">
                                                        <label for="company">Company</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea name="description" class="form-control" id="description" cols="35" rows="5">{{ $exp->description }}</textarea>
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

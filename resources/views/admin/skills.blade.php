@extends('admin.layout.dashboard')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Skills</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Skills</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add New Skill</h5>
                <p class="card-title-desc">Enter details for the new skill</p>

                <form action="{{ url('/admin/addSkill') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="skill" placeholder="Enter Skill" name="skill">
                        <label for="skill">Skill</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="percentage" placeholder="Enter Percentage" name="percentage">
                        <label for="percentage">Percentage</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="proficiency" id="proficiency" aria-label="Select Proficiency Level">
                            <option value="" selected>Select Proficiency Level</option>
                            <option value="Novice">Novice (0-20%)</option>
                            <option value="Beginner">Beginner (21-40%)</option>
                            <option value="Intermediate">Intermediate (41-60%)</option>
                            <option value="Advanced">Advanced (61-80%)</option>
                            <option value="Expert">Expert (81-100%)</option>
                        </select>
                        <label for="proficiency">Proficiency Level</label>
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
                <h5 class="card-title mb-4">Skills List</h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach($skills as $skill)
                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $skill->skill }}</a></h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $skill->percentage }}%</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        {{ $skill->proficiency }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editSkill{{ $skill->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 

                                        <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteSkill{{ $skill->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <!-- Static Backdrop Modal -->
                                        <div class="modal fade" id="deleteSkill{{ $skill->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteSkill" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                
                                                    <form action="{{ url('/admin/deleteSkill') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p class="text-center"> Are you sure you want to delete "{{ $skill->skill }}"?</p>
                                                            <input type="hidden" name="skill_id" value="{{ $skill->id }}">
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
                                        <div class="modal fade" id="editSkill{{ $skill->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editSkill" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Skill</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ url("/admin/editSkill") }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="skill_id" value="{{ $skill->id }}">

                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="skill" value="{{ $skill->skill }}" name="skill">
                                                                <label for="skill">Skill</label>
                                                            </div>
                                        
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" id="percentage" value="{{ $skill->percentage }}" name="percentage">
                                                                <label for="percentage">Percentage</label>
                                                            </div>
                                        
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select" name="proficiency" id="proficiency" aria-label="Select Proficiency Level" value="{{ $skill->proficiency}}">
                                                                    <option value="">Select Proficiency Level</option>
                                                                    <option value="Novice" @if($skill->proficiency == 'Novice') selected @endif>Novice (0-20%)</option>
                                                                    <option value="Beginner" @if($skill->proficiency == 'Beginner') selected @endif>Beginner (21-40%)</option>
                                                                    <option value="Intermediate" @if($skill->proficiency == 'Intermediate') selected @endif>Intermediate (41-60%)</option>
                                                                    <option value="Advanced" @if($skill->proficiency == 'Advanced') selected @endif>Advanced (61-80%)</option>
                                                                    <option value="Expert" @if($skill->proficiency == 'Expert') selected @endif>Expert (81-100%)</option>
                                                                </select>
                                                                <label for="proficiency">Proficiency Level</label>
                                                            </div>               
                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

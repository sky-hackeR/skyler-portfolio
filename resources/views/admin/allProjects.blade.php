@extends('admin.layout.dashboard')

@section('content')
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
                        <td>{{ Illuminate\Support\Str::limit(strip_tags($project->description), 30) }}</td>
                        <td>
                            <div class="text-end">

                                <a class="btn btn-outline-primary btn-sm edit" title="Edit" href="{{ url('/admin/projects/'.$project->id.'/edit') }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> 

                                <a class="btn btn-outline-secondary btn-sm edit" title="Manage Images" href="{{ url('/admin/projects/'.$project->id.'/images') }}">
                                    <i class="fas fas fa-images"></i>
                                </a> 
    
                                <a class="btn btn-outline-danger btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteProject{{ $project->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
    
                            <!-- Static Backdrop Modal -->
                            <div class="modal fade" id="deleteProject{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteProject" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    
                                        <form action="{{ url('/admin/projects/'.$project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
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

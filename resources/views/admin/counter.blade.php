@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Counter Info</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Counter Info</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Set Counter Information</h5>
                <p class="card-title-desc">Set Counter Information</p>

                <form action="{{ url('/admin/updateCounter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="year" placeholder="Enter Year" name="year">
                        <label for="year">Year</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="clients" placeholder="Enter Clients" name="clients">
                        <label for="clients">Clients</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="projects" placeholder="Enter Projects" name="projects">
                        <label for="projects">Projects</label>
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
                <h5 class="card-title mb-4">Counter Information </h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach($counters as $counter)
                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $counter->year }}</a></h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $counter->clients }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $counter->projects }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editCounterInfo{{ $counter->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 
                                        <!-- Update Counter Info Modal -->
                                        <div class="modal fade" id="editCounterInfo{{ $counter->id }}" tabindex="-1" role="dialog" aria-labelledby="editCounterInfo" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editCounterInfo">Edit Counter Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ url('/admin/updateCounter') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="counter_id" value="{{ $counter->id }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="edit_year" class="form-label">Year</label>
                                                                <input type="text" class="form-control" id="year" name="year" value="{{ $counter->year }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_client" class="form-label">Phone Number</label>
                                                                <input type="text" class="form-control" id="clients" name="clients" value="{{ $counter->clients }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_projects" class="form-label">Projects</label>
                                                                <input type="text" class="form-control" id="projects" name="projects" value="{{ $counter->projects }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
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


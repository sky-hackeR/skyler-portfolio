@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Contact Info</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Contact Info</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Set Contact Information</h5>
                <p class="card-title-desc">Set Contact Information</p>

                <form action="{{ url('/admin/addContactInfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
                        <label for="email">Email</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number">
                        <label for="phone_number">Phone Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                        <label for="address">Address</label>
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
                <h5 class="card-title mb-4">Contact Information </h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $contact->email }}</a></h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $contact->phone_number }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $contact->address }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editContactInfo{{ $contact->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 

                                        <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteContactInfo{{ $contact->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <!-- Edit Contact Info Modal -->
                                        <div class="modal fade" id="editContactInfo{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="editContactInfo" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editContactInfo">Edit Contact Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ url('/admin/editContactInfo') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="edit_email" class="form-label">Email</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_phone_number" class="form-label">Phone Number</label>
                                                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $contact->phone_number }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_address" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}">
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

                                        <!-- Delete Contact Info Modal -->
                                        <div class="modal fade" id="deleteContactInfo{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteContactInfo" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteContactInfo">Delete Contact Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ url('/admin/deleteContactInfo') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete the contact information?</p>
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
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Socials</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Socials</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Set Site Social Media Links</h5>
                <p class="card-title-desc">Set Social Media Links</p>

                <form action="{{ url('/admin/addSocial') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter Social Media Name" name="name">
                        <label for="name">Social Media Name</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="link" placeholder="Enter Social Media Link" name="link">
                        <label for="link">Social Media link</label>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="icon" id="icon" aria-label="Select Social Media Icon">
                                <option value="" selected>Select Social Media Icon</option>
                                <option value="iconoir-facebook">Facebook Icon</option>
                                <option value="iconoir-instagram">Instagram Icon</option>
                                <option value="iconoir-twitter">Twitter Icon</option>
                                <option value="iconoir-youtube">Youtube Icon</option>
                                <option value="iconoir-whatsapp">Whatsapp Icon</option>
                                <option value="iconoir-linkedin">Linkedin Icon</option>
                                <option value="iconoir-mail">Email Icon</option>
                                <option value="iconoir-github">Github Icon</option>
                            </select>
                            <label for="icon">Select Social Media Icon</label>
                        </div>
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Save</button>
                    </div>
                </form>

                
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
                <h5 class="card-title mb-4">Social Media </h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach($socials as $social)
                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $social->name }}</a></h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ $social->link }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editSocial{{ $social->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 

                                        <a class="btn btn-outline-danger btn-sm edit" title="delete" data-bs-toggle="modal" data-bs-target="#deleteSocial{{ $social->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <!-- Static Backdrop Modal -->
                                        <div class="modal fade" id="deleteSocial{{ $social->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteSocial" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                
                                                    <form action="{{ url('/admin/deleteSocial') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p class="text-center"> Are you sure you want to delete {{ $social->name }}</p>
                                                            <input type="hidden" name="social_id" value="{{ $social->id }}">
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
                                        <div class="modal fade" id="editSocial{{ $social->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editSocial" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ url("/admin/editSocial") }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="social_id" value="{{ $social->id }}">

                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="name" value="{{ $social->name }}" name="name">
                                                                <label for="name">Social Media Name</label>
                                                            </div>
                                        
                                        
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="link" value="{{ $social->link }}" name="link">
                                                                <label for="link">Social Media link</label>
                                                            </div>
                                        
                                                            <div class="col-md-12">
                                                                <div class="form-floating mb-3">
                                                                    <select class="form-select" name="icon" id="icon" aria-label="Select Social Media Icon">
                                                                        <option value="iconoir-facebook" @if($social->icon == 'iconoir-facebook') selected @endif>Facebook Icon</option>
                                                                        <option value="iconoir-instagram" @if($social->icon == 'iconoir-instagram') selected @endif>Instagram Icon</option>
                                                                        <option value="iconoir-twitter" @if($social->icon == 'iconoir-twitter') selected @endif>Twitter Icon</option>
                                                                        <option value="iconoir-youtube" @if($social->icon == 'iconoir-youtube') selected @endif>Youtube Icon</option>
                                                                        <option value="iconoir-whatsapp" @if($social->icon == 'iconoir-whatsapp') selected @endif>Whatsapp Icon</option>
                                                                        <option value="iconoir-linkedin" @if($social->icon == 'iconoir-linkedin') selected @endif>Linkedin Icon</option>
                                                                        <option value="iconoir-mail" @if($social->icon == 'iconoir-mail') selected @endif>Email Icon</option>                                                                       
                                                                        <option value="iconoir-github" @if($social->icon == 'iconoir-github') selected @endif>Github Icon</option>                                                                         
                                                                    </select>
                                                                    <label for="icon">Select Social Media Icon</label>
                                                                </div>
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

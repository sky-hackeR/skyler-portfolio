@extends('admin.layout.auth')

<!-- Main Content -->
@section('content')

<div class="bg-primary-subtle">
    <div class="row">
        <div class="col-7">
            <div class="text-primary p-4">
                <h5 class="text-primary"> Reset Password</h5>
                <p>Reset Password with  {{ !empty($pageGlobalData->setting)?$pageGlobalData->setting->site_name:null }} for Administrators.</p>
            </div>
        </div>
        <div class="col-5 align-self-end">
            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
<div class="card-body pt-0"> 
    <div>
        <a href="{{ url('/') }}">
            <div class="avatar-md profile-user-wid mb-4">
                <span class="avatar-title rounded-circle bg-light">
                    <img src=" {{ !empty($pageGlobalData->setting)?$pageGlobalData->setting->logo_dark:null }}" alt="" class="rounded avatar-sm" height="15">
                </span>
            </div>
        </a>
    </div>
    
    <div class="p-2">
        @if (session('status'))
            <div class="alert alert-success text-center mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
       
        <form class="form-horizontal" method="POST" action="{{ url('/admin/password/email') }}">
            @csrf
            <div class="mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="text-end">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit"> Send Password Reset Link</button>
            </div>

        </form>
    </div>

</div>

@endsection

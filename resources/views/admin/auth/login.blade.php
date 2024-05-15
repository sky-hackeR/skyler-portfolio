@extends('admin.layout.auth')

@section('content')
<div class="bg-primary-subtle">
    <div class="row">
        <div class="col-7">
            <div class="text-primary p-4">
                <h5 class="text-primary">Welcome Back !</h5>
                <p>Sign in to continue to {{ !empty($pageGlobalData->setting)?$pageGlobalData->setting->site_name:null }} Adminstrator.</p>
            </div>
        </div>
        <div class="col-5 align-self-end">
            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
<div class="card-body pt-0"> 
    <div class="auth-logo">
        <a href="{{ url('/') }}" class="auth-logo-light">
            <div class="avatar-md profile-user-wid mb-4">
                <span class="avatar-title rounded-circle bg-light">
                    <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->logo_dark: null }}" alt="" class="rounded avatar-sm" height="15">
                </span>
            </div>
        </a>

        <a href="{{ url('/') }}" class="auth-logo-dark">
            <div class="avatar-md profile-user-wid mb-4">
                <span class="avatar-title rounded-circle bg-light">
                    <img src="{{ !empty($pageGlobalData->setting)?$pageGlobalData->setting->logo_dark:null }}" alt="" class="rounded avatar-sm" height="15">
                </span>
            </div>
        </a>
    </div>
    <div class="p-2">
        <form class="form-horizontal" method="POST" action="{{ url('/admin/login') }}">
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

            <div class="mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="form-label">Password</label>
                <div class="input-group auth-pass-inputgroup">
                    <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-check">
                <label class="form-check-label" for="remember-check">
                    Remember me
                </label>
            </div>
            
            <div class="mt-3 d-grid">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ url('/admin/password/reset') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
            </div>
        </form>
    </div>

</div>


@endsection

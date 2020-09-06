@extends('laravel-mentor::auth.auth')

@section('title', 'Login')

@section('content')
<p>Welcome back, please login to your account.</p>
<form action="" class="mt-2 mt-sm-5">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">User Name*</label>
                <input type="text" class="form-control" placeholder="Username" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">Password*</label>
                <input type="password" class="form-control" placeholder="Password" />
            </div>
        </div>
        <div class="col-12">
            <div class="d-block d-sm-flex  align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Remember Me
                    </label>
                </div>
                <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <a href="index.html" class="btn btn-primary text-uppercase">Sign In</a>
        </div>
        <div class="col-12  mt-3">
            <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
        </div>
    </div>
</form>

@endsection
                                    
@extends('laravel-mentor::auth.auth')

@section('title', 'Register')

@section('content')
<p>Welcome back, please create an account.</p>
<form action="" class="mt-2 mt-sm-5">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label class="control-label">First Name*</label>
                <input type="text" class="form-control" placeholder="First Name" />
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label class="control-label">Last Name*</label>
                <input type="text" class="form-control" placeholder="Last Name" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">Email*</label>
                <input type="email" class="form-control" placeholder="Email" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">Username*</label>
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    I accept terms & policy
                </label>
            </div>
        </div>
        <div class="col-12 mt-3">
            <a href="auth-login.html" class="btn btn-primary text-uppercase">Sign up</a>
        </div>
        <div class="col-12  mt-3">
            <p>Already have an account ?<a href="auth-login.html"> Sign In</a></p>
        </div>
    </div>
</form>

@endsection
                                    
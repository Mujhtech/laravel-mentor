@extends('laravel-mentor::auth.auth')

@section('title', 'Confirm')

@section('content')
<p>Welcome back, please confirm your account.</p>
<form action="" class="mt-2 mt-sm-5">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">Email Address*</label>
                <input type="text" class="form-control" placeholder="Username" />
            </div>
        </div>
        <div class="col-12 mt-3">
            <a href="index.html" class="btn btn-primary text-uppercase">Confirm</a>
        </div>
        <div class="col-12  mt-3">
            <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
        </div>
    </div>
</form>

@endsection
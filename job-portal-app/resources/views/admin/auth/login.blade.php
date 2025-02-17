@extends('admin.auth.layouts.auth-maste')

@section('contents')
<section class="section">
<div class="container mt-5">
    <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
        <div class="card-header"><h4>Login</h4></div>

        <div class="card-body">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="#" class="needs-validation" novalidate="" action="{{ route('admin.login') }}">
                @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' :''}}" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="float-right">
                    <a href="{{ route('admin.password.request')}}" class="text-small">
                    Forgot Password?
                    </a>
                </div>
            
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

       

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
                </button>
            </div>
            </form>


        </div>
        </div>

    </div>
    </div>
</div>
</section>
@endsection

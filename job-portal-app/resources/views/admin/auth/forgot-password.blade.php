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
                <div class="card-header"><h4>Forgot Password</h4></div>

                <div class="card-body">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('admin.password.email') }}">
                    @csrf

                    <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" :value="old('email')" tabindex="1" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>



                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Email Reset Link
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


@extends('frontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-12">
            <h2 class="mb-20">Create an account</h2>
            <ul class="breadcrumbs">
            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
            <li>Create an account</li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="pt-120 login-register">
    <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
        <div class="login-register-cover">
            <div class="text-center">
            <h2 class="mb-5 text-brand-1">Register</h2>
            <p class="font-sm text-muted mb-30">Sign up new account.</p>
            </div>
            <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                @csrf
            <div class="row">
                <div class="col-xl-12>
                <div class="form-group">
                    <label class="form-label" for="name">Full Name *</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" type="text" required name="name" value="{{ old('name') }}"
                    placeholder="Steven Job"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                </div>


                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="form-label" for="email">Email *</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" type="email" required name="email" value="{{ old('email') }}"
                        placeholder="stevenjob@gmail.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>


                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="form-label" for="password">Password *</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" type="password" required="" name="password"
                        placeholder="************">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Re-Password *</label>
                        <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" id="password_confirmation" type="password" required="" name="password_confirmation"
                        placeholder="************">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>
                </div>


                <div class="col-12 mb-3">
                <hr>
                <h6 for="" class="mb-2">Create Account For</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{ $errors->has('account_type') ? 'is-invalid' : ''}}" type="radio" name="account_type" id="typeCandidate" value="candidate">
                    <label class="form-check-label" for="typeCandidate">Candidate</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{ $errors->has('account_type') ? 'is-invalid' : ''}}" type="radio" name="account_type" id="typeCompany" value="company">
                    <label class="form-check-label" for="typeCompany">Company</label>
                </div>

                @if ($errors->has('account_type'))
                    <div class="invalid-feedback d-block">{{ $errors->first('account_type') }}</div>
                @endif
                
                </div>
            <div class="form-group">
                <button class="btn btn-default hover-up w-100" type="submit" name="login">Submit &amp;
                Register</button>
            </div>
            <div class="text-muted text-center">Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </div>
            </form>
            {{-- <div class="text-center mt-20">
            <div class="divider-text-center"><span>Or continue with</span></div>
            <button class="btn social-login hover-up mt-20"><img src="assets/imgs/template/icons/icon-google.svg"
                alt="joblist"><strong>Sign up with Google</strong></button>
            </div> --}}
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
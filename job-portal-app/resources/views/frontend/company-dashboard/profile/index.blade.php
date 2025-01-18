@extends('frontend.layouts.master')


@section('contents')
<section class="section-box mt-75">
<div class="breacrumb-cover">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
        <h2 class="mb-20">Blog</h2>
        <ul class="breadcrumbs">
            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
            <li>Profile</li>
        </ul>
        </div>
    </div>
    </div>
</div>
</section>

<section class="section-box mt-120">
<div class="container">
    <div class="row">
@include('frontend.company-dashboard.sidebar')
    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
        {{-- <div class="content-single">
        <h3 class="mt-0 mb-15 color-brand-1">My Account</h3><a class="font-md color-text-paragraph-2"
            href="#">Update your profile</a> --}}
        {{-- <div class="mt-35 mb-40 box-info-profie">
            <div class="image-profile"><img src="{{ asset('frontend/assets/imgs/page/candidates/candidate-profile.png') }}" alt="joblist">
            </div><a class="btn btn-apply">Upload Avatar</a><a class="btn btn-link">Delete</a>
        </div> --}}
        <div class="row form-contact">


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Company Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Founding info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Account Setting</button>
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form action="{{ route('company.profile.info-company') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" />
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file" name="logo">
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-image-preview :height="200" :width="400" :source="$companyInfo?->banner" />
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}" type="file" name="banner">
                                <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Company name *</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ $companyInfo?->name }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                        <textarea name="bio" class="summernote {{ $errors->has('bio') ? 'is-invalid' : '' }}">{{ $companyInfo?->bio }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                        <textarea name="vision" class="summernote {{ $errors->has('vision') ? 'is-invalid' : '' }}">{{ $companyInfo?->vision }}</textarea>
                    <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                    </div>
                </div>
                <div class="box-button mt-15">
                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                </div>
            </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <form action="{{ route('company.profile.founding-info') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">industry_type *</label>
                                    <select name="industry_type_id" id="" class="form-control select-active {{ $errors->has('industry_type_id') ? 'is-invalid' : '' }}">
                                        <option value="">select</option>
                                        <option value="0">as</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('industry_type_id')" class="mt-2" />
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                    <label class="font-sm color-text-mutted mb-10">organization_type *</label>
                                    <select name="organization_type_id" id="" class="form-control select-active {{ $errors->has('organization_type_id') ? 'is-invalid' : '' }}">
                                        <option value="">select</option>
                                        <option value="0">as</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('organization_type_id')" class="mt-2" />
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted mb-10">Team size *</label>
                                        <select name="team_size_id" id="" class="form-control select-active {{ $errors->has('team_size_id') ? 'is-invalid' : '' }}">
                                        <option value="">select</option>
                                            <option value="0">as</option>
                                            <option value="">ass</option>
                                            <option value="">ssa</option>
                                        </select>
                                    <x-input-error :messages="$errors->get('team_size_id')" class="mt-2" />
                                    </div>
                                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">establishment_date</label>
                                <input class="form-control {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}" name="establishment_date" type="date" value="{{ $companyInfo?->establishment_date }}" />
                                <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">WebSite *</label>
                                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" name="website" type="text" value="{{ $companyInfo?->website }}" />
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" value="{{ $companyInfo?->email }}"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Phone</label>
                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="number" value="{{ $companyInfo?->phone }}" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">country*</label>
                                <select name="country" id="" class="form-control select-active {{ $errors->has('country') ? 'is-invalid' : '' }}">
                                    <option value="">select</option>
                                    <option value="0">as</option>
                                    <option value="">ass</option>
                                    <option value="">ssa</option>
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                    <label class="font-sm color-text-mutted mb-10">state*</label>
                                    <select name="state" id="" class="form-control select-active {{ $errors->has('state') ? 'is-invalid' : '' }}">
                                        <option value="">select</option>
                                        <option value="0">as</option>
                                    
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted mb-10">city *</label>
                                        <select name="city" id="" class="form-control select-active {{ $errors->has('city') ? 'is-invalid' : '' }}">
                                            <option value="">select</option>
                                            <option value="0">as</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                    </div>
                                    </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Adresse *</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" type="text" value="{{ $companyInfo?->address }}"/>
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">MAp Link *</label>
                                <input class="form-control {{ $errors->has('map_link') ? 'is-invalid' : '' }}" name="map_link" type="text" value="{{ $companyInfo?->map_link }}"/>
                                <x-input-error :messages="$errors->get('map_link')" class="mt-2" />

                            </div>
                        </div>
                    </div>
                    <div class="box-button mt-15">
                        <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                        </div>
                </form>

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <form action="{{ route('company.profile.account-info') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Name</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ auth()->user()->name }}"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ auth()->user()->email }}"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-default btn-shadow">Save</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('company.profile.password') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Password</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">confirm Password</label>
                                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-default btn-shadow">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>



            {{-- <div class="col-md-6">
            <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                <input class="form-control" type="text" value="Steven Job">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Email *</label>
                <input class="form-control" type="text" value="stevenjob@gmail.com">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Contact number</label>
                <input class="form-control" type="text" value="01 - 234 567 89">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Personal website</label>
                <input class="form-control" type="url" value="https://alithemes.com">
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Bio</label>
                <textarea class="form-control"
                rows="4">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Country</label>
                <input class="form-control" type="text" value="United States">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">State</label>
                <input class="form-control" type="text" value="New York">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">City</label>
                <input class="form-control" type="text" value="Mcallen">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Zip code</label>
                <input class="form-control" type="text" value="82356">
                </div>
            </div>
            </div>
            <div class="border-bottom pt-10 pb-10 mb-30"></div>
            <h6 class="color-orange mb-20">Change your password</h6>
            <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Password</label>
                <input class="form-control" type="password" value="123456789">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <label class="font-sm color-text-mutted mb-10">Re-Password *</label>
                <input class="form-control" type="password" value="123456789">
                </div>
            </div>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
            <div class="box-agree mt-30">
            <label class="lbl-agree font-xs color-text-paragraph-2">
                <input class="lbl-checkbox" type="checkbox" value="1">Available for freelancers
            </label>
            </div>
            <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
            </div>
        </div> --}}
        </div>
    </div>
    </div>
</div>
</section>
@endsection
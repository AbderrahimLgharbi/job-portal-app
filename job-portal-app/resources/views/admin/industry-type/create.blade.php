@extends('admin.layouts.master')

@section('content')
    <div>
        <section class="section">
            <div class="section-header">
                <h1>industry Page</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Industry</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.industry-types.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Industry Name</label>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

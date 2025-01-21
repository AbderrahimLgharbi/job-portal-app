@extends('admin.layouts.master')

@section('content')
    <div>
        <section class="section">
            <div class="section-header">
                <h1>Organization Page</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Advanced Table</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.organization-types.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.organization-types.create') }}" class="btn btn-primary"><i
                                class="fas fa-plus-circle"></i> Create New</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>Actions</th>
                                </tr>

                                @forelse ($organizationTypes as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.organization-types.edit', $type->id) }}"
                                                class="btn-sm btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.organization-types.destroy', $type->id) }}"
                                                class="btn-sm btn btn-danger delete-industry delete-industry"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No result !!</td>
                                    </tr>
                                @endforelse

                            </table>


                        </div>
                    </div>

                    <div class="card-footer flex justify-center">
                        @if ($organizationTypes->hasPages())
                            {{ $organizationTypes->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

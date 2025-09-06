@extends('backend.layouts.app')

@section('title', 'Departments List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Departments List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Departments</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-left text-left my-1">
                                <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">Add Department</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table-striped table" id="table-1">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th>Name</th>
            <th>Interns Count</th>
            <th>Executive Members Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $index => $department)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->interns->count() }}</td>
            <td>{{ $department->executiveMembers->count() }}</td>
            <td class="d-flex">
                <a href="{{ route('admin.departments.edit', $department->id) }}"
                   class="btn btn-warning btn-sm mr-1" title="Edit">
                   <i class="fas fa-pencil-alt"></i>
                </a>

                <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                            </div> <!-- table-responsive -->
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/page/modules-datatables.js') }}"></script>
@endpush

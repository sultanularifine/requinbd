@extends('backend.layouts.app')

@section('title', 'Intern List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Intern List</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Interns</div>
                    <div class="breadcrumb-item">Intern List</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.interns.create') }}" class="btn btn-primary">Add Intern</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="interns-table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                             
                                                <th>Joining Date</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($interns as $index => $intern)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $intern->name }}</td>
                                                    <td>{{ $intern->email }}</td>
                                                    <td>{{ $intern->phone }}</td>
                                                    <td>{{ $intern->department_id ? $intern->department->name : '-' }}</td>
                                                   
                                                    <td>{{ $intern->joining_date }}</td>
                                                    <td>
                                                        @if ($intern->photo)
                                                            <img src="{{ asset($intern->photo) }}" alt="photo"
                                                                width="50">
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.interns.show', $intern->id) }}"
                                                            class="btn btn-info btn-sm mr-1" title="View">View</a>
                                                        <a href="{{ route('admin.interns.edit', $intern->id) }}"
                                                            class="btn btn-warning btn-sm mr-1" title="Edit">Edit</a>
                                                        {{-- <a href="{{ route('admin.interns.certificate', $intern->id) }}"
                                                            class="btn btn-success btn-sm mr-1"
                                                            title="Certificate">Certificate</a> --}}
                                                        <form action="{{ route('admin.interns.destroy', $intern->id) }}"
                                                            method="POST" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#interns-table').DataTable();
        });
    </script>
@endpush

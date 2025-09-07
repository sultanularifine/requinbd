@extends('backend.layouts.app')

@section('title', 'Director List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Director List</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Directors</div>
                    <div class="breadcrumb-item">Director List</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.directors.create') }}" class="btn btn-primary">Add Director</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="directors-table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($directors as $index => $director)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $director->name }}</td>
                                                    <td>{{ $director->designation }}</td>
                                                    <td>{{ $director->department }}</td>
                                             
                                                    <td>
                                                        @if($director->photo)
                                                            <img src="{{ asset($director->photo) }}" alt="photo" width="50">
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.directors.show', $director->id) }}"
                                                            class="btn btn-info btn-sm mr-1" title="View">View</a>
                                                        <a href="{{ route('admin.directors.edit', $director->id) }}"
                                                            class="btn btn-warning btn-sm mr-1" title="Edit">Edit</a>
                                                        <form action="{{ route('admin.directors.destroy', $director->id) }}"
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
            $('#directors-table').DataTable();
        });
    </script>
@endpush

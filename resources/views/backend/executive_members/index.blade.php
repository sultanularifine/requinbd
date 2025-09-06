@extends('backend.layouts.app')

@section('title', 'Executive Member List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Executive Member List</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Executive Members</div>
                    <div class="breadcrumb-item">Member List</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.executive_members.create') }}" class="btn btn-primary">Add Member</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="members-table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Designation</th>
                                                <th>Joining Date</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($members as $index => $member)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $member->name }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>{{ $member->phone }}</td>
                                                    <td>{{ $member->department_id ? $member->department->name : '-' }}</td>
                                                    <td>{{ $member->designation }}</td>
                                                    <td>{{ $member->joining_date }}</td>
                                                    <td>
                                                        @if($member->photo)
                                                            <img src="{{ asset($member->photo) }}" alt="photo" width="50">
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.executive_members.show', $member->id) }}"
                                                            class="btn btn-info btn-sm mr-1" title="View">View</a>
                                                        <a href="{{ route('admin.executive_members.edit', $member->id) }}"
                                                            class="btn btn-warning btn-sm mr-1" title="Edit">Edit</a>
                                                        <form action="{{ route('admin.executive_members.destroy', $member->id) }}"
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
            $('#members-table').DataTable();
        });
    </script>
@endpush

@extends('backend.layouts.app')

@section('title', 'Certificate Signatures List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Certificate Signatures List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Certificates</div>
                <div class="breadcrumb-item">Signatures List</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">Add Signature</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="certificates-table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Department</th>
                                            <th>Name 1</th>
                                            <th>Designation 1</th>
                                            <th>Signature 1</th>
                                            <th>Name 2</th>
                                            <th>Designation 2</th>
                                            <th>Signature 2</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $index => $certificate)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $certificate->department ? $certificate->department->name : '-' }}</td>
                                                <td>{{ $certificate->name1 }}</td>
                                                <td>{{ $certificate->designation1 }}</td>
                                                <td>
                                                    @if ($certificate->signature1)
                                                        <img src="{{ asset('storage/' . $certificate->signature1) }}" alt="Signature 1" width="50">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $certificate->name2 }}</td>
                                                <td>{{ $certificate->designation2 }}</td>
                                                <td>
                                                    @if ($certificate->signature2)
                                                        <img src="{{ asset('storage/' . $certificate->signature2) }}" alt="Signature 2" width="50">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-warning btn-sm mr-1" title="Edit">Edit</a>
                                                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" title="Delete">Delete</button>
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
        $('#certificates-table').DataTable();
    });
</script>
@endpush

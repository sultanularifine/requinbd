@extends('backend.layouts.app')

@section('title', 'Session List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sessions</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Sessions</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('sessions.create') }}" class="btn btn-primary">Add Session</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="session-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Mode</th>
                                    <th>Platform</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sessions as $index => $session)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $session->icon ?? '-' }}</td>
                                    <td>{{ $session->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($session->description, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($session->date)->format('d M, Y') }}</td>
                                    <td>{{ $session->mode }}</td>
                                    <td>{{ $session->platform }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                                        <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#session-table').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 7 } // Disable ordering on Action column
            ]
        });
    });
</script>
@endpush

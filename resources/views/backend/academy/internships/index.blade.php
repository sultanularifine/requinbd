@extends('backend.layouts.app')

@section('title', 'Internship List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Internships</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Internships</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('internships.create') }}" class="btn btn-primary">Add Internship</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="internship-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Stipend</th>
                                    <th>Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($internships as $index => $internship)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $internship->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($internship->description, 50) }}</td>
                                    <td>{{ $internship->duration }}</td>
                                    <td>{{ $internship->stipend ?? '-' }}</td>
                                    <td>{{ $internship->mode }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('internships.edit', $internship->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                                        <form action="{{ route('internships.destroy', $internship->id) }}" method="POST" style="display:inline-block;">
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
        $('#internship-table').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 6 } // Disable ordering on Action column
            ]
        });
    });
</script>
@endpush

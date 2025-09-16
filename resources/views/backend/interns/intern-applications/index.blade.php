@extends('backend.layouts.app')

@section('title', 'Pending Internship Applications')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pending Internship Applications</h1>
            <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Internship</div>
            <div class="breadcrumb-item">Applications</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Applications Waiting for Approval</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="applications-table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Institution</th>
                                            <th>Applied At</th>
                                            <th>CV</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $index => $app)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $app->formal_name }}</td>
                                            <td>{{ $app->email }}</td>
                                            <td>{{ optional($app->department)->name ?? '-' }}</td>
                                            <td>{{ $app->contact_no }}</td>
                                            <td>{{ $app->institution }}</td>
                                            <td>{{ $app->created_at->format('d M, Y') }}</td>

                                            <!-- CV -->
                                            <td>
                                                @if ($app->cv)
                                                    <a href="{{ asset($app->cv) }}" target="_blank" class="btn btn-sm btn-info">View CV</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                            <!-- Photo -->
                                            <td>
                                                @if ($app->photo)
                                                    <img src="{{ asset($app->photo) }}" alt="photo" width="50">
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                            <td class="d-flex">
                                                <form action="{{ route('admin.intern-applications.approve', $app->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm mr-1">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.intern-applications.decline', $app->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
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
        $('#applications-table').DataTable();
    });
</script>
@endpush

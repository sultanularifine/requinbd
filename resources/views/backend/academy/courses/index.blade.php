@extends('backend.layouts.app')

@section('title', 'Course List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Course List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Academic</a></div>
                <div class="breadcrumb-item">Courses</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-left text-left my-1">
                                <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $index => $course)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if ($course->icon)
                                                        <div class="badge badge-primary">{{ $course->icon }}</div>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td>{{ $course->title }}</td>
                                                <td>
                                                    {!! implode(' ', array_slice(explode(' ', $course->description ?? ''), 0, 15)) !!}...
                                                </td>
                                                <td>{{ $course->tags }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-action btn-sm mr-1"
                                                        data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm btn-action" data-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
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
    <script src="{{ asset('backend/js/page/modules-datatables.js') }}"></script>
@endpush

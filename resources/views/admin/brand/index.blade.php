@extends('backend.layouts.app')

@section('title', 'Brands List')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Brands List</h1>
            <div class="section-header-button">
                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add Brand</a>
            </div>
        </div>

        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="brands-table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brands as $index => $brand)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if($brand->image)
                                                        <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" width="80">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->link ?? '-' }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning btn-sm mr-1" title="Edit">Edit</a>
                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($brands->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">No brands found.</td>
                                            </tr>
                                        @endif
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
        $('#brands-table').DataTable();
    });
</script>
@endpush

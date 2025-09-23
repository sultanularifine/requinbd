@extends('backend.layouts.app')

@section('title', 'Our Impact Settings')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Our Impact</h1>
        </div>

        <!-- Add Impact Form -->
        <form action="{{ route('admin.impacts.store') }}" method="POST">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Number*</label>
                        <input type="text" class="form-control" name="number" required>
                    </div>

                    <div class="form-group">
                        <label>Title*</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Add Impact</button>
                </div>
            </div>
        </form>

        <!-- List of Impacts -->
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Number</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($impacts as $index => $impact)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $impact->number }}</td>
                            <td>{{ $impact->title }}</td>
                            <td>
                                <form action="{{ route('admin.impacts.destroy', $impact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

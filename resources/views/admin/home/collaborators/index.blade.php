@extends('backend.layouts.app')

@section('title', 'Collaborators Settings')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Collaborators</h1>
        </div>

        <!-- Add Collaborator Form -->
        <form action="{{ route('admin.collaborators.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Logo*</label>
                        <input type="file" class="form-control" name="logo" required>
                    </div>

                    <div class="form-group">
                        <label>Link (optional)</label>
                        <input type="url" class="form-control" name="link">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Add Collaborator</button>
                </div>
            </div>
        </form>

        <!-- List of Collaborators -->
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collaborators as $index => $c)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($c->logo)
                                    <img src="{{ asset('backend/'.$c->logo) }}" width="100">
                                @endif
                            </td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->link }}</td>
                            <td>
                                <form action="{{ route('admin.collaborators.destroy', $c->id) }}" method="POST">
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

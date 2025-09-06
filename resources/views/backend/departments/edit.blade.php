@extends('backend.layouts.app')

@section('title', 'Edit Department')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Department</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">Departments List</a></div>
                <div class="breadcrumb-item">Edit Department</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body card card-primary">
                                <div class="form-group">
                                    <label for="name"><b>Department Name*</b></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $department->name) }}" required>
                                </div>
                            </div>

                            <div class="card-footer text-left my-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>

                        @if ($errors->any())
                        <div class="card-body">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

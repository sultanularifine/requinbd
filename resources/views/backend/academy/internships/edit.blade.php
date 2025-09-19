@extends('backend.layouts.app')

@section('title', 'Edit Internship')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Internship</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('internships.index') }}">Internships</a></div>
                <div class="breadcrumb-item">Edit Internship</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Update Internship Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('internships.update', $internship->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title"><b>Title*</b></label>
                                    <input type="text" name="title" id="title" class="form-control" 
                                        value="{{ old('title', $internship->title) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="duration"><b>Duration*</b></label>
                                    <input type="text" name="duration" id="duration" class="form-control" 
                                        value="{{ old('duration', $internship->duration) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description"><b>Description*</b></label>
                                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $internship->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="stipend"><b>Stipend</b></label>
                                    <input type="text" name="stipend" id="stipend" class="form-control" 
                                        value="{{ old('stipend', $internship->stipend) }}">
                                </div>

                                <div class="form-group">
                                    <label for="mode"><b>Mode</b></label>
                                    <select name="mode" id="mode" class="form-control" required>
                                        <option value="Remote" {{ old('mode', $internship->mode) == 'Remote' ? 'selected' : '' }}>Remote</option>
                                        <option value="On-site" {{ old('mode', $internship->mode) == 'On-site' ? 'selected' : '' }}>On-site</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Internship</button>
                            </form>

                            @if($errors->any())
                                <div class="mt-3">
                                    <ul class="text-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

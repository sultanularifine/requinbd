@extends('backend.layouts.app')

@section('title', 'Add Internship')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Internship</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('internships.index') }}">Internships</a></div>
                <div class="breadcrumb-item">Add Internship</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-body">
                        <form action="{{ route('internships.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label><b>Title*</b></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label><b>Duration*</b></label>
                                <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" required>
                            </div>

                            <div class="form-group">
                                <label><b>Description*</b></label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label><b>Stipend</b></label>
                                <input type="text" name="stipend" class="form-control" value="{{ old('stipend') }}">
                            </div>

                            <div class="form-group">
                                <label><b>Mode</b></label>
                                <select name="mode" class="form-control">
                                    <option value="Remote" {{ old('mode') == 'Remote' ? 'selected' : '' }}>Remote</option>
                                    <option value="On-site" {{ old('mode') == 'On-site' ? 'selected' : '' }}>On-site</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

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
    </section>
</div>
@endsection

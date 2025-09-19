@extends('backend.layouts.app')

@section('title', 'Add Session')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Session</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('sessions.index') }}">Sessions</a></div>
                <div class="breadcrumb-item">Add Session</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-body">
                        <form action="{{ route('sessions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label><b>Title*</b></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label><b>Date*</b></label>
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group">
                                <label><b>Description*</b></label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label><b>Mode*</b></label>
                                <select name="mode" class="form-control" required>
                                    <option value="Free" {{ old('mode') == 'Free' ? 'selected' : '' }}>Free</option>
                                    <option value="Paid" {{ old('mode') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Platform*</b></label>
                                <select name="platform" class="form-control" required>
                                    <option value="Google Meet" {{ old('platform') == 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
                                    <option value="Zoom" {{ old('platform') == 'Zoom' ? 'selected' : '' }}>Zoom</option>
                                    <option value="On-site" {{ old('platform') == 'On-site' ? 'selected' : '' }}>On-site</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Icon</b></label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="e.g., 🧑‍🏫">
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

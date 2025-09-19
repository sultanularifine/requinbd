@extends('backend.layouts.app')

@section('title', 'Edit Session')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Session</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('sessions.index') }}">Sessions</a></div>
                    <div class="breadcrumb-item">Edit Session</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Update Session Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sessions.update', $session->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title"><b>Title*</b></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title', $session->title) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="date"><b>Date*</b></label>
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ old('date', $session->date->format('Y-m-d')) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description"><b>Description*</b></label>
                                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $session->description) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="mode"><b>Mode*</b></label>
                                        <select name="mode" id="mode" class="form-control" required>
                                            <option value="Free"
                                                {{ old('mode', $session->mode) == 'Free' ? 'selected' : '' }}>Free</option>
                                            <option value="Paid"
                                                {{ old('mode', $session->mode) == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Platform*</b></label>
                                        <select name="platform" class="form-control" required>
                                            <option value="Google Meet" @selected(old('platform') == 'Google Meet')>Google Meet</option>
                                            <option value="Zoom" @selected(old('platform') == 'Zoom')>Zoom</option>
                                            <option value="On-site" @selected(old('platform') == 'On-site')>On-site</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="icon"><b>Icon</b></label>
                                        <input type="text" name="icon" id="icon" class="form-control"
                                            value="{{ old('icon', $session->icon) }}" placeholder="e.g., 🧑‍🏫">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Session</button>
                                </form>

                                @if ($errors->any())
                                    <div class="mt-3">
                                        <ul class="text-danger">
                                            @foreach ($errors->all() as $error)
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

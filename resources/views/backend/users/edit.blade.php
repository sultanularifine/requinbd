@extends('backend.layouts.app')

@section('title', 'Edit User')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-button">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label"><strong>Name</strong></label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Email</strong></label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Role</strong></label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                            <option value="executive" {{ $user->role=='executive'?'selected':'' }}>Executive</option>
                            <option value="intern" {{ $user->role=='intern'?'selected':'' }}>Intern</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Photo</strong></label>
                        <input type="file" name="image" class="form-control">
                        @if($user->image)
                            <img src="{{ asset($user->image) }}" alt="image" width="80" height="80" class="rounded-circle mt-2">
                        @endif
                    </div>

                    <hr>
                    <h5 id="password">Change Password</h5>
                    <div class="mb-3">
                        <label class="form-label"><strong>New Password</strong></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Confirm New Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Executive Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
       class="btn btn-danger">Logout</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Executive management panels -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center p-3">Manage Internships</div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">Manage Interns</div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">Manage Ratings / Certificates</div>
        </div>
    </div>
</div>
@endsection

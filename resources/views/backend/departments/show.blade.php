@extends('backend.layouts.app')

@section('title', 'Department View')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Department: {{ $department->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments List</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Interns in this Department:</h4>
                        @if($department->interns->count() > 0)
                            <ul class="list-group">
                                @foreach($department->interns as $intern)
                                    <li class="list-group-item">
                                        {{ $intern->name }} - {{ $intern->email }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No interns found in this department.</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

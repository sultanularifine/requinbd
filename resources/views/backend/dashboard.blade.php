@extends('backend.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/all.min.css') }}">

    <style>
        /* Main Card */
        #list1 {
            
            background:  #16191aff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        /* Title */
        .card-body .h4 {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
        }

        .card-body .h4 span {
            background: linear-gradient(90deg, #ff6b6b, #f7b42c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Form Inputs */
        .form-control-lg {
            border-radius: 10px;
            background: #f0f2f5;
            border: none;
            color: #212529;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .form-control-lg:focus {
            background: #fff;
            box-shadow: 0 0 10px rgba(255, 183, 77, 0.7);
            transform: scale(1.02);
        }

        /* Add Task Button */
        .btn-lg {
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            background: linear-gradient(90deg, #ff6b6b, #f7b42c);
            border: none;
        }

        .btn-lg:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.4);
        }

        /* Task Header */
        .task-header {
            background: rgba(255,255,255,0.2);
            padding: 10px 15px;
            border-radius: 12px;
            font-weight: 600;
        }

        /* Task Item */
        .task-item {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease-in-out;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .task-item:hover {
            background: rgba(255,255,255,0.25);
            transform: scale(1.02);
        }

        .task-item p {
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
        }

        /* Badges */
        .badge {
            font-size: 0.85rem;
            border-radius: 8px;
        }

        /* Buttons */
        .btn-sm {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-sm:hover {
            transform: scale(1.1);
        }

        /* Responsive for mobile */
        @media (max-width: 768px) {
            .task-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .task-item .d-flex.align-items-center.justify-content-between.gap-3.w-50 {
                flex-direction: column;
                align-items: flex-start;
                width: 100% !important;
                gap: 0.5rem !important;
                margin-top: 10px;
            }

            .task-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-row {
                flex-direction: column;
            }

            .form-row .col-md-4,
            .form-row .col-md-3,
            .form-row .col-md-2 {
                width: 100%;
                margin-bottom: 10px;
            }

            .btn-lg {
                width: 100%;
            }
        }
    </style>
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-md-12">
                    <div class="card shadow-lg" id="list1">
                        <div class="card-body py-4 px-4 px-md-5">

                            <!-- Title -->
                            <div class="text-center mt-3 mb-4 pb-3">
                                <p class="h4 position-relative d-inline-block">
                                    <i class="fas fa-tasks me-2" style="color: #FFC107;"></i>
                                    <span>To-Do List</span>
                                </p>
                            </div>

                            <!-- Task Form -->
                            <div>
                                <div class="card border-0 shadow-sm" style="background-color: rgba(255,255,255,0.05); border-radius: 15px;">
                                    <div class="card-body">
                                        <form action="{{ route('todo.store') }}" method="POST" class="form-row d-flex flex-wrap gap-2">
                                            @csrf
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Task name..." />
                                            </div>
                                            <div class="col-md-3">
                                                <input type="time" name="time" class="form-control form-control-lg" />
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" name="date" class="form-control form-control-lg" />
                                            </div>
                                            <div class="col-md-2 d-grid">
                                                <button type="submit" class="btn btn-lg">Add Task</button>
                                            </div>
                                        </form>

                                        @if ($errors->any())
                                            <ul class="mt-3 text-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 text-light">

                            <!-- Task List Header -->
                            <div class="task-header d-flex justify-content-between text-light">
                                <p class="mb-0 ">Tasks</p>
                                <div class="d-flex justify-content-between" style="gap: 15px;">
                                    <p class="mb-0">Time</p>
                                    <p class="mb-0">Due Date</p>
                                    <p class="mb-0">Actions</p>
                                </div>
                            </div>

                            <!-- Task List -->
                            <div class="rows mt-3">
                                @foreach ($data as $index => $dt)
                                    <div class="task-item">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                            <p class="mb-0 p-2">{{ $dt->name }}</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between gap-2 w-50 flex-wrap">
                                            <span class="badge bg-info text-dark p-2">
                                                {{ \Carbon\Carbon::parse($dt->time)->format('h:i A') }}
                                            </span>
                                            <span class="badge bg-warning text-dark p-2">
                                                {{ \Carbon\Carbon::parse($dt->date)->format('j F Y') }}
                                            </span>
                                            <div class="d-flex align-items-center gap-2 ">
                                                <a href="{{ route('todo.edit', $dt->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('todo.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger m-2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('backend/js/page/index-0.js') }}"></script>
@endpush

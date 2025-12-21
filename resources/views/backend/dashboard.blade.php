@extends('backend.layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/all.min.css') }}">

    <style>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }

        /* Task Header */
        .task-header {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 15px;
            border-radius: 12px;
            font-weight: 600;
        }

        /* Task Item */
        .task-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease-in-out;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .task-item:hover {
            background: rgba(255, 255, 255, 0.25);
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

        .todo-card {
            background: #1f3b73;
            border-radius: 15px;
            padding: 20px;
            color: #fff;
            margin-bottom: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .todo-card .task-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 10px 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .todo-card .task-item p {
            margin: 0;
            color: #fff;
        }

        .todo-card .badge {
            font-size: 0.85rem;
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
                                <!-- To-Do List Section -->
                                <h2 class="section-title">To-Do List</h2>
                                <div class="todo-card">
                                    <!-- Add New Task Form -->
                                    <form action="{{ route('todo.store') }}" method="POST" class="mb-3">
                                        @csrf
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Task name..." required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="time" name="time" class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success w-100">Add Task</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Task List -->
                                    @foreach ($data as $index => $task)
                                        <div class="task-item col-md-12">
                                            <!-- Normal Display -->
                                            <div class="d-flex justify-content-between w-100 align-items-center">
                                                <div>
                                                    <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                                    <span class="ms-2">{{ $task->name }}</span>
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span
                                                        class="badge bg-info">{{ \Carbon\Carbon::parse($task->time)->format('h:i A') }}</span>
                                                    <span
                                                        class="badge bg-warning">{{ \Carbon\Carbon::parse($task->date)->format('j F Y') }}</span>
                                                    <a href="{{ route('todo.edit', $task->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('todo.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fas fa-trash-alt"></i></button>
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

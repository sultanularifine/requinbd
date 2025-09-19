@extends('backend.layouts.app')

@section('title', 'Comments')

@push('style')
<link rel="stylesheet" href="{{ asset('backend/library/datatables/media/css/jquery.dataTables.min.css') }}">
<style>
    .badge-approved {
        background-color: #28a745;
        color: white;
        padding: 3px 7px;
        border-radius: 5px;
        font-size: 0.85rem;
    }
    .badge-pending {
        background-color: #ffc107;
        color: black;
        padding: 3px 7px;
        border-radius: 5px;
        font-size: 0.85rem;
    }
</style>
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Comments</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="comments-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Blog Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $index => $comment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $comment->blog->title }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        @if($comment->status === 'approved')
                                            <span class="badge-approved">Approved</span>
                                        @else
                                            <span class="badge-pending">Pending</span>
                                        @endif
                                    </td>
                                    <td class="d-flex gap-1">
                                        @if($comment->status !== 'approved')
                                            <a href="{{ route('admin.comment.approve', $comment->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Approve Comment"><i class="fas fa-check"></i></a>
                                        @endif
                                        <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Comment" onclick="return confirm('Are you sure to delete this comment?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#comments-table').DataTable({
            "ordering": true,
            "paging": true,
            "searching": true,
            "responsive": true
        });
    });
</script>
@endpush

<?php

namespace App\Http\Controllers;

use App\Models\Comment as ModelsComment;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Show comments for the blogs owned by the logged-in user
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin sees all comments
            $comments = Comment::with('blog')->orderBy('created_at', 'desc')->get();
        } else {
            // Other users see only comments on their blogs
            $comments = Comment::whereHas('blog', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('blog')->orderBy('created_at', 'desc')->get();
        }

        return view('backend.blog.comment.index', compact('comments'));
    }

    // Delete a comment
    public function destroy($id)
    {
        $comment = ModelsComment::findOrFail($id);

        // Check ownership
        if (Auth::user()->role !== 'admin' && $comment->blog->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    // Approve a comment
public function approve($id)
{
    $comment = Comment::findOrFail($id);

    // Only admin or the blog owner can approve
    if (Auth::user()->role !== 'admin' && $comment->blog->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    $comment->status = 'approved'; // You can use 'pending' / 'approved'
    $comment->save();

    return redirect()->back()->with('success', 'Comment approved successfully.');
}

}

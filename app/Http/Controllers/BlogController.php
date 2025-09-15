<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // List all blogs
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin') {
            $blogs = Blog::all();
        } else {
            $blogs = Blog::where('user_id', $user->id)->get();
        }
        return view('backend.blog.index', compact('blogs'));
    }

    // Show create form
    public function create()
    {
        return view('backend.blog.create');
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'blog_date' => 'required|date',
            'category' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        $user = Auth::user();

        $blog = new Blog();
        $blog->user_id = $user->id;
        $blog->author = $request->author ?? $user->name;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->description = $request->description;
        $blog->blog_date = $request->blog_date;
        $blog->category = $request->category;
        $blog->tags = $request->tags;

        if ($request->hasFile('thumbnail')) {
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = time() . '_' . $thumbnailFile->getClientOriginalName();
            $thumbnailFile->move(public_path('backend/thumbnails'), $thumbnailPath);
            $blog->thumbnail = 'backend/thumbnails/' . $thumbnailPath;
        }

        $blog->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $blogImage = new BlogImage();
                $blogImage->blog_id = $blog->id;
                $imagePath = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('backend/images'), $imagePath);
                $blogImage->image = 'backend/images/' . $imagePath;
                $blogImage->save();
            }
        }

        return redirect()->route('blog.list')->with('success', 'Blog created successfully.');
    }

    // Show single blog
    public function show($id)
    {
        $blog = Blog::with('blogImage')->findOrFail($id);

        if ($blog->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('backend.blog.view', compact('blog'));
    }

    // Edit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('backend.blog.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'blog_date' => 'required|date',
            'category' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $blog->author = $request->author ?? Auth::user()->name;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->description = $request->description;
        $blog->blog_date = $request->blog_date;
        $blog->category = $request->category;
        $blog->tags = $request->tags;

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
                unlink(public_path($blog->thumbnail));
            }
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = time() . '_' . $thumbnailFile->getClientOriginalName();
            $thumbnailFile->move(public_path('backend/thumbnails'), $thumbnailPath);
            $blog->thumbnail = 'backend/thumbnails/' . $thumbnailPath;
        }

        $blog->save();

        if ($request->hasFile('image')) {
            $oldImages = BlogImage::where('blog_id', $blog->id)->get();
            foreach ($oldImages as $row) {
                if ($row->image && file_exists(public_path($row->image))) {
                    unlink(public_path($row->image));
                }
                $row->delete();
            }

            foreach ($request->file('image') as $image) {
                $blogImage = new BlogImage();
                $blogImage->blog_id = $blog->id;
                $imagePath = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('backend/images'), $imagePath);
                $blogImage->image = 'backend/images/' . $imagePath;
                $blogImage->save();
            }
        }

        return redirect()->route('blog.list')->with('success', 'Blog updated successfully.');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
            unlink(public_path($blog->thumbnail));
        }

        $images = BlogImage::where('blog_id', $blog->id)->get();
        foreach ($images as $image) {
            if ($image->image && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }
            $image->delete();
        }

        $blog->delete();

        return redirect()->route('blog.list')->with('success', 'Blog deleted successfully.');
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category', 'tags'])->latest()->paginate(10);
        return view('backend.admin.posts.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //     $table->string('title');
        //     $table->string('slug')->unique();
        //     $table->string('thumbnail')->nullable();
        //     $table->text('content');
        //     $table->unsignedBigInteger('category_id')->nullable();
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->timestamps();

        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        // $request->validate([
        //     'title' => 'required',
        //     'category_id' => 'required',
        //     'content' => 'required',
        //     'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = Str::slug($request->title);
            $extension = $file->getClientOriginalExtension();
            $filename = $name . '.' . $extension;
            $file->move('upload/posts', $filename);
            $blog->thumbnail = $filename;
        }
        $blog->content = $request->content;
        $blog->save();
        //notification
        $blog->tags()->attach($request->tags);
        return redirect()->route('blog.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //with relation
        $blog = Blog::with(['category', 'tags'])->findOrFail($blog->id);
        return view('backend.admin.posts.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //with relation
        $blog = Blog::with(['category', 'tags'])->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.posts.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //with relation
        $blog = Blog::with(['category', 'tags'])->findOrFail($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = Str::slug($request->title);
            $extension = $file->getClientOriginalExtension();
            $filename = $name . '.' . $extension;
            $file->move('upload/posts', $filename);
            $blog->thumbnail = $filename;
        }
        $blog->content = $request->content;
        $blog->save();
        //notification
        $blog->tags()->sync($request->tags);
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //with relation
        $blog = Blog::with(['category', 'tags'])->findOrFail($id);
        // thumbnail delete
        if ($blog->thumbnail) {
            unlink('upload/posts/' . $blog->thumbnail);
        }
        $blog->tags()->detach();
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
    }
}

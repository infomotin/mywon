<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category','author','tags')->latest()->paginate(10);
        return view('backend.admin.posts.index', compact('posts'));
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
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'content'=>'required',
        ]);
        if($request->hasFile('image'))
        {
            $request->file('image')->move(public_path('uploads/posts'), $request->file('image')->getClientOriginalName());
            $post = Post::create([
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'category_id'=>$request->category_id,
                'excerpt'=>substr($request->content,0,200),
                'content'=>$request->content,
                'image'=>$request->file('image')->getClientOriginalName(),
                'user_id'=>Auth::user()->id,
            ]);
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'content'=>'required',
        ]);
        if($request->hasFile('image'))
        {
            $request->file('image')->move(public_path('uploads/posts'), $request->file('image')->getClientOriginalName());
            $post->update([
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'category_id'=>$request->category_id,
                'excerpt'=>substr($request->content,0,200),
                'content'=>$request->content,
                'image'=>$request->file('image')->getClientOriginalName(),
                'user_id'=>Auth::user()->id,
            ]);
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}

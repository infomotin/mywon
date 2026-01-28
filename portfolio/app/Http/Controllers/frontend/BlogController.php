<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function details($id)
    {
        $blog = Blog::with(['category', 'tags', 'author'])->findOrFail($id);
        $recentBlogs = Blog::latest()->where('id', '!=', $id)->take(3)->get();
        return view('frontend.blog_details', compact('blog', 'recentBlogs'));
    }
}

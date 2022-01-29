<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::all()
        ]);
    }

    public function show($blog)
    {
        return view('blogs.show', [
            'blog'=>Blog::where('slug', $blog)->firstOrFail()
        ]);
    }
}

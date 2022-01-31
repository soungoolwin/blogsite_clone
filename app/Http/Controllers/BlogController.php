<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::all(),
            'categories'=>Category::all(),
            'currentCategory'=>null
        ]);
    }

    public function show($blog)
    {
        return view('blogs.show', [
            'blog'=>Blog::where('slug', $blog)->firstOrFail(),
            'blogyoumaylike'=>Blog::inRandomOrder()->limit(3)->get()
        ]);
    }

    public function category(Category $category)
    {
        return view('blogs.index', [
            'blogs'=>$category->blogs,
            'categories'=>Category::all(),
            'currentCategory'=>$category
        ]);
    }
}

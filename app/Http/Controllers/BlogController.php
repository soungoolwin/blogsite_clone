<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // if (request('search')) {
        //     $blogs = $blogs->where('title', 'LIKE', '%' . request('search') . '%');
        // }
        // $query=$query->when(request('search'), function ($query, $search) {
        //     $query->where('title', 'LIKE', '%' . $search . '%')
        //         ->orWhere('body', 'LIKE', '%' . $search . '%');
        // });
        

        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog'=>$blog,
            'blogyoumaylike'=>Blog::with('author', 'category')->inRandomOrder()->limit(3)->get()
        ]);
    }
}

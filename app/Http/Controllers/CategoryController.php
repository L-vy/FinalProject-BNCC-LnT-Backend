<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $books = $category->books()->paginate(8); // Optional pagination

        return view('categories.show', compact('category', 'books'));
    }
}

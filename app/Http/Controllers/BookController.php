<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with(['books' => function($query) {
            $query->where('stock', '>', 0)->take(4);
        }])->get();

        return view('dashboard', compact('categories'));
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('title', 'like', "%{$query}%")
                    ->orWhere('author', 'like', "%{$query}%")
                    ->get();

        return view('book.search', compact('books', 'query'));
    }
}

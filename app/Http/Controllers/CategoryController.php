<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
   
       public function index()
       {
           // Fetch all categories with their associated books
           $categories = Category::with('books')->get(); 
           return view('categories.index', compact('categories')); // Pass categories to the view
       }
   


    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $books = $category->books()->paginate(8);
        $categories = Category::all(); // Fetch all categories

        return view('categories.show', compact('category', 'books', 'categories')); // Pass categories to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        $otherCategories = Category::where('id', '!=', $category->id)->get();
        $books = $category->books;
        $categories = Category::all(); // Fetch all categories

        return view('categories.edit', compact('category', 'otherCategories', 'books', 'categories')); // Pass categories to the view
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'book_categories' => 'nullable|array',
            'book_categories.*' => 'exists:categories,id',
        ]);

        // Update the category name
        $category->name = $request->name;
        $category->slug = Str::slug($request->name); // Optionally update slug too
        $category->save();

        // Update each book's category if changed
        if ($request->filled('book_categories')) {
            foreach ($request->book_categories as $bookId => $newCategoryId) {
                $book = Book::find($bookId);
                if ($book && $book->category_id != $newCategoryId) {
                    $book->category_id = $newCategoryId;
                    $book->save();
                }
            }
        }

        return redirect()->route('categories.edit', $category)->with('success', 'Category and book assignments updated successfully.');
    }
}


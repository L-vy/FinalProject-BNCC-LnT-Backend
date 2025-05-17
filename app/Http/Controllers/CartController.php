<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, Book $book)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            $cart[$book->id] = [
                'title' => $book->title,
                'author' => $book->author,
                'price' => $book->price,
                'quantity' => 1,
                'cover_image' => $book->cover_image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', "{$book->title} added to cart!");
    }

    public function update(Request $request, Book $book)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity');
        $book = Book::findOrFail($book->id);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Request $request, Book $book)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            unset($cart[$book->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Book removed from cart!');
    }

    public function checkout()
    {
        // Placeholder for checkout process
        return view('cart.checkout');
    }
}

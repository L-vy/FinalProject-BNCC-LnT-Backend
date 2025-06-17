@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Update Book</h2>

        {{-- Display Validation Errors --}}
        @if($errors->any())
            <div class="mb-6 bg-red-100 text-red-800 p-4 rounded">
                <ul class="list-disc pl-6">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $book->title) }}"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-semibold mb-2">Author</label>
                <input
                    type="text"
                    name="author"
                    id="author"
                    value="{{ old('author', $book->author) }}"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Publisher -->
            <div class="mb-4">
                <label for="publisher" class="block text-gray-700 font-semibold mb-2">Publisher</label>
                <input
                    type="text"
                    name="publisher"
                    id="publisher"
                    value="{{ old('publisher', $book->publisher) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >{{ old('description', $book->description) }}</textarea>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                <select
                    name="category_id"
                    id="category_id"
                    required
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 bg-gray-100 text-gray-700 px-3 py-2"
                >
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Number of Pages -->
            <div class="mb-4">
                <label for="pages" class="block text-gray-700 font-semibold mb-2">Number of Pages</label>
                <input
                    type="number"
                    name="pages"
                    id="pages"
                    value="{{ old('pages', $book->number_of_page) }}"
                    required
                    min="1"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price ($)</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    step="0.01"
                    value="{{ old('price', $book->price) }}"
                    required
                    min="0"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock</label>
                <input
                    type="number"
                    name="stock"
                    id="stock"
                    value="{{ old('stock', $book->stock) }}"
                    required
                    min="0"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-700"
                >
            </div>

            <!-- Cover Image -->
            <div class="mb-6">
                <label for="cover_image" class="block text-gray-700 font-semibold mb-2">Book Cover</label>
                @if($book->cover_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}" class="w-32 h-auto rounded">
                    </div>
                @endif
                <input
                    type="file"
                    name="cover_image"
                    id="cover_image"
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 text-gray-700 px-3 py-2"
                >
                <small class="text-gray-500">Leave blank to keep current cover image.</small>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200"
                >
                    Update Book
                </button>
            </div>
        </form>
    </div>

    <!-- Back Button -->
    <div class="flex justify-center mt-8">
        <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-800 underline text-sm">
            ← Back to Current Book
        </a>
    </div>
</div>
@endsection

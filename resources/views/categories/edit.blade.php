@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Category</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $category->name) }}"
                    required
                    placeholder="Enter new category name"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 text-gray-800 px-3 py-2"
                >
            </div>

            @if($books->count())
                <h3 class="block text-sm font-medium text-gray-700 mb-1">Assign Books to Categories</h3>

                <div class="space-y-4 max-h-96 overflow-y-auto border p-4 rounded bg-gray-50">
                    @foreach($books as $book)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                @if($book->cover_image)
                                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}" class="w-12 h-16 object-cover rounded">
                                @else
                                    <div class="w-12 h-16 bg-gray-300 flex items-center justify-center rounded text-gray-400">
                                        N/A
                                    </div>
                                @endif
                                <span class="text-gray-800">{{ $book->title }}</span>
                            </div>

                            <select name="book_categories[{{ $book->id }}]"
                                    class="border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200 px-3 py-2 text-gray-800">
                                @foreach($allCategories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex justify-end space-x-2 mt-6">
                <a href="{{ route('dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

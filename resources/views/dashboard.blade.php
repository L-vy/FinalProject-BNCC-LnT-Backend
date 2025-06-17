@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Admin only buttons --}}
    @auth
        @if (Auth::user()->role === 'admin')
            <div class="mb-12">
                <div class="flex justify-center mb-6 border-b pb-2 space-x-4">
                    <a href="{{ route('books.create') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm transition duration-200 flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Book
                    </a>

                    <button id="openCategoryModal"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded text-sm transition duration-200 flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Category
                    </button>
                </div>
            </div>
        @endif
    @endauth

    {{-- Add Category Modal --}}
    @auth
        @if (Auth::user()->role === 'admin')
            <div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 max-w-md mx-auto w-full">
                    <h3 class="text-lg font-bold mb-4 text-gray-800">Add New Category</h3>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                            <input type="text" name="name" id="name" required placeholder="Type new category here"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 text-gray-800 px-3 py-2">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" id="cancelCategory"
                                class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 rounded bg-yellow-500 hover:bg-yellow-600 text-white">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endauth

    {{-- Delete Category Modal --}}
    @auth
        @if (Auth::user()->role === 'admin')
            <div id="deleteCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 max-w-md mx-auto w-full">
                    <h3 class="text-lg font-bold mb-4 text-gray-800">Delete Category</h3>
                    <p class="text-red-700 mb-4">Are you sure you want to delete the category
                        <span id="categoryName" class="font-semibold"></span>?</p>
                    <form id="deleteCategoryForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('dashboard') }}"
                                class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 inline-block text-center">Cancel</a>
                            <button type="submit"
                                class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endauth

    {{-- Showing Books per Category --}}
    @forelse($categories as $category)
        @if($category->books->count() > 0)
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2 flex justify-between items-center">
                    {{ $category->name }}
                    <div class="flex gap-4 text-sm">
                        <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-500 hover:underline">View All</a>

                        {{-- Admin Only Edit/Delete --}}
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-orange-500 hover:text-orange-600">Edit</a>
                                <a href="#"
                                    class="text-orange-500 hover:text-orange-600"
                                    onclick="openDeleteModal({{ $category->id }}, '{{ $category->name }}')">Delete</a>
                            @endif
                        @endauth
                    </div>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($category->books as $book)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                @if($book->cover_image)
                                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">{{ $book->title }}</h3>
                                <p class="text-gray-600 mb-2">by {{ $book->author }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">${{ number_format($book->price, 2) }}</span>
                                    <a href="{{ route('books.show', $book) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition duration-200">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @empty
        <div class="text-center py-12">
            <p class="text-gray-500 text-xl">No categories or books found.</p>
            @if(!\App\Models\Book::count())
                <p class="mt-4">You need to seed your database with books.</p>
                <div class="mt-4">
                    <a href="/seed-database" class="bg-blue-500 text-white px-4 py-2 rounded">Seed Database</a>
                </div>
            @endif
        </div>
    @endforelse
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openCategoryBtn = document.getElementById('openCategoryModal');
        const categoryModal = document.getElementById('categoryModal');
        const cancelCategoryBtn = document.getElementById('cancelCategory');

        if (openCategoryBtn && categoryModal && cancelCategoryBtn) {
            openCategoryBtn.addEventListener('click', () => {
                categoryModal.classList.remove('hidden');
                categoryModal.classList.add('flex');
            });

            cancelCategoryBtn.addEventListener('click', () => {
                categoryModal.classList.add('hidden');
                categoryModal.classList.remove('flex');
            });

            categoryModal.addEventListener('click', (e) => {
                if (e.target === categoryModal) {
                    categoryModal.classList.add('hidden');
                    categoryModal.classList.remove('flex');
                }
            });
        }
    });

    function openDeleteModal(categoryId, categoryName) {
        const deleteModal = document.getElementById('deleteCategoryModal');
        const form = document.getElementById('deleteCategoryForm');
        const nameSpan = document.getElementById('categoryName');

        form.action = `/categories/${categoryId}`;
        nameSpan.textContent = categoryName;

        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('flex');
    }

    const cancelDeleteBtn = document.getElementById('cancelDeleteCategory');
    if (cancelDeleteBtn) {
        cancelDeleteBtn.addEventListener('click', () => {
            document.getElementById('deleteCategoryModal').classList.add('hidden');
            document.getElementById('deleteCategoryModal').classList.remove('flex');
        });
    }

    const deleteModalOverlay = document.getElementById('deleteCategoryModal');
    if (deleteModalOverlay) {
        deleteModalOverlay.addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
            }
        });
    }
</script>
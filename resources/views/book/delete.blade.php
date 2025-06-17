@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Delete Book</h2>

        <p class="mb-4 font-bold text-red-600">
            Are you sure you want to delete the following book? This action cannot be undone.
        </p>

        <div class="mb-6 border rounded p-4 bg-gray-50">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $book->title }}</h3>

            @if($book->cover_image)
                <div class="mt-4 mx-auto">
                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}" class="w-48 rounded shadow block mx-auto">
                </div>
            @endif


            <p class="text-gray-700 mb-1"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="text-gray-700 mb-1"><strong>Publisher:</strong> {{ $book->publisher }}</p>
            <p class="text-gray-700 mb-1"><strong>Pages:</strong> {{ $book->number_of_page }}</p>
            <p class="text-gray-700 mb-1"><strong>Price:</strong> ${{ number_format($book->price, 2) }}</p>
            <p class="text-gray-700 mb-1"><strong>Description:</strong> {{ $book->description ?? 'N/A' }}</p>
            <p class="text-gray-700 mb-1"><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</p>
            <p class="text-gray-700 mb-1"><strong>Stock:</strong> {{ $book->stock }}</p>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('books.show', $book) }}" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">
                Cancel
            </a>

            <!-- Button triggers modal -->
            <button id="openDeleteModal" type="button" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white">
                Delete Book
            </button>
        </div>

        <!-- Confirmation Pop Up Window -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
                <h3 class="text-lg font-bold mb-4 text-red-600">Confirm Delete</h3>
                <p class="mb-6">
                    Are you sure you want to delete <strong>{{ $book->title }}</strong>? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-4">
                    <button id="cancelDelete" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">
                        Cancel
                    </button>
                    <form id="deleteForm" action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openModalBtn = document.getElementById('openDeleteModal');
        const deleteModal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelDelete');

        openModalBtn.addEventListener('click', () => {
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        });

        cancelBtn.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
        });

        // Close modal if clicking outside the box
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }
        });
    });
</script>
@endsection

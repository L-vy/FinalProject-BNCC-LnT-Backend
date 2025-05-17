@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Search Results for: <span class="text-blue-600">{{ $query }}</span>
    </h2>

    @if($books->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13..." />
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
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-lg">No books found matching "<strong>{{ $query }}</strong>".</p>
    @endif

    <div class="flex justify-center mt-10">
        <a href="{{ route('dashboard') }}"
           class="inline-block text-sm text-blue-600 hover:text-blue-800 underline">
            ← Back to Dashboard
        </a>
    </div>
</div>
@endsection

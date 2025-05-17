@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Book Cover -->
            <div class="md:w-1/3 p-6 flex justify-center bg-gray-100">
                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="h-96 object-contain">
                @else
                    <div class="w-full h-96 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13..." />
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Book Details -->
            <div class="md:w-2/3 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $book->title }}</h1>
                <p class="text-gray-600 text-lg mb-4">by {{ $book->author }}</p>

                <div class="flex items-center mb-6">
                    <span class="text-2xl font-bold text-blue-600">${{ number_format($book->price, 2) }}</span>
                    <span class="ml-4 px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded">
                        {{ $book->stock }} in stock
                    </span>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                    <p class="text-gray-700">{{ $book->description }}</p>
                </div>

                <div class="flex space-x-4">
                    <!-- Add to Cart Form -->
                    <form action="{{ route('cart.add', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                    </form>

                    <!-- Buy Now Button (Just Redirects for Now) -->
                    <form action="{{ route('cart.checkout') }}" method="GET" class="inline-block">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center">
                            <i class="fas fa-bolt mr-2"></i> Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Back Button -->
    <div class="flex justify-center mt-8">
        <a href="{{ route('dashboard') }}"
        class="inline-block mb-6 text-sm text-blue-600 hover:text-blue-800 underline">
        ← Back to Dashboard
        </a>
    </div>
</div>
@endsection

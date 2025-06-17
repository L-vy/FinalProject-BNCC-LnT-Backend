@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>
    <p>This is a placeholder for your checkout process. Integrate payment gateway here.</p>
    <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Back to Home</a>
</div>
@endsection

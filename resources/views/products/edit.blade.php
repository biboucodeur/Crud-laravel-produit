@extends('layout')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Modifier le Produit</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nom du produit</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Prix</label>
            <input type="number" name="price" value="{{ $product->price }}" class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
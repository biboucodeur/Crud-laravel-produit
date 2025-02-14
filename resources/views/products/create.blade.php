@extends('layout')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Ajouter un Produit</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nom du produit</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Prix</label>
            <input type="number" name="price" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Stock</label>
            <input type="number" name="stock" class="w-full border px-3 py-2 rounded" value="0" required>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
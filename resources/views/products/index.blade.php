@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <form method="GET" action="{{ route('products.index') }}" class="mb-4 bg-white p-4 rounded shadow">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-gray-700">Nom</label>
                <input type="text" name="name" value="{{ request('name') }}" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Prix Min</label>
                <input type="number" name="min_price" value="{{ request('min_price') }}" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Prix Max</label>
                <input type="number" name="max_price" value="{{ request('max_price') }}" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Stock Min</label>
                <input type="number" name="min_stock" value="{{ request('min_stock') }}" class="w-full border px-3 py-2 rounded">
            </div>
        </div>
        <div class="mt-4 flex justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrer</button>
            <a href="{{ route('products.index') }}" class="text-red-500">Réinitialiser</a>
        </div>
    </form>

    <h2 class="text-2xl font-bold mb-5">Liste des Produits</h2>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter un produit</a>

    <table class="w-full mt-5 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Nom</th>
                <th class="border p-2">Prix</th>
                <th class="border p-2">Stock</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($products->isEmpty())
            <tr>
                <td colspan="4" class="text-center text-gray-500 py-4">Aucun produit trouvé !</td>
            </tr>
            @endif

            @foreach($products as $product)

            <tr>
                <td class="border p-2 text-center">{{ $product->name }}</td>
                <td class="border p-2 text-center">{{ $product->price }} F CFA</td>
                <td class="border p-2 text-center">{{ $product->stock }}</td>
                <td class="border p-2 text-center">
                    <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

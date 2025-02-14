<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Affiche la liste des produits avec possibilité de filtrage.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtrer par nom
        if ($request->has('name') && !empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Filtrer par prix minimum
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filtrer par prix maximum
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filtrer par stock minimum
        if ($request->has('min_stock') && is_numeric($request->min_stock)) {
            $query->where('stock', '>=', $request->min_stock);
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Enregistre un nouveau produit dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un produit spécifique.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Affiche le formulaire de modification d'un produit.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Met à jour un produit existant dans la base de données.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime un produit de la base de données.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}

<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Rediriger la page d'accueil vers la liste des produits
Route::get('/', [ProductController::class, 'index']);

// CRUD des produits
Route::resource('products', ProductController::class);

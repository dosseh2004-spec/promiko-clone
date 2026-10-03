<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $categories = Category::orderBy('nom')->get();
        $products = Product::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nom', 'like', "%{$search}%");
                });
            })


            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(4)
            ->withQueryString();
        return view('home', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('shops.show', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AccueilContoller extends Controller
{
    //
    public function index()
    {
        $nombreProduits = Product::count();
        $nombreCategories = Category::count();
        $nombreCommandes = Order::count();
        $nombreClients = User::where('role', 'secretaire')->count();

        return view('accueils.index', compact(
            'nombreProduits',
            'nombreCategories',
            'nombreCommandes',
            'nombreClients'
        ));
    }

    public function All_orders()
    {
        $orders = Order::with('user')->latest()->get();
        return view('accueils.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'statut' => 'required|in:en attente,confirmée,expédiée,livrée,annulée',
        ]);

        $order->update([
            'status' => $request->statut
        ]);

        return redirect()->back();
    }

    public function show(Order $order)
    {
        $cart = session()->get('cart', []);
        $order->load('user', 'items.product');

        return view('accueils.orders.show', compact('order', 'cart'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderContoller extends Controller
{
    //
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('orders.create', compact('cart'));
    }

    public function store(Request $request, Order $order)
    {
        //validation
        $request->validate([
            'nom' => 'required|string|max:225',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|',

        ]);

        //recupération du panier

        $cart = session()->get('cart', []);

        // verifie si le panier est vide

        if (empty($cart)) {
            return redirect()->route('shops.cart')->with('error', 'votre panier est vide');
        }

        //parcourir le panier pour voir si la quantité du product commender est supérieur au product stock

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if (!$product) {
                return redirect()->route('shops.cart');
            }
            if ($item['quantite'] > $product->stock) {
                return redirect()->route('shops.cart')->with('error', 'Le stock de ' . $product->nom . ' est insuffisant.');
            }
        }


        //
        $total = 0;
        foreach ($cart as $item) {
            $total = $item['prix'] * $item['quantite'];
        }
        // enregistrer le client avec le prix total des commende
        $order = Order::create([
            'user_id' => auth()->id(),
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'total' => $total,
            'statut' => 'en attente',

        ]);

        //parcourie le panier pour fait diminier le product stocker lors qu'on éffectuer le commende

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            $order->items()->create([
                'product_id' => $productId,
                'quantite' => $item['quantite'],
                'prix' => $item['prix'],
            ]);
            $product->decrement('stock', $item['quantite']);
        }

        //vider le panier apres validation de commende
        session()->forget('cart');
        return redirect()->route('shops.cart')->with('success', 'votre commende a été éffectuer avvec succès !');
    }


    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        $cart = session()->get('cart', []);
        $order->load('items.product');
        return view('orders.show', compact('order', 'cart'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'commende à été anuller');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class shopContoller extends Controller
{
    //
    public function add(Product $product)
    {
        //recupération du panier s'il nexiste pas utilisé le tableau vide
        $cart = session()->get('cart', []);

        //vérification du stockage
        if ($product->stock <= 0) {
            return back()->with('error', 'Ce produits est en rupture de stock');
        }

        //vérifie si le produit exist déjà
        if (isset($cart[$product->id])) {
            //s'il existe déjà on augment sa quantité
            $cart[$product->id]['quantite']++;
        } else {
            //s'il n'existe dans le panier on le créer
            $cart[$product->id] = [
                'product_id' => $product->id,
                'nom' => $product->nom,
                'prix' => $product->prix,
                'quantite' => 1,
                'photo' => $product->photo,

            ];
        }

        //enregistrer le panier dans la session
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function cart()
    {
        //
        $cart = session()->get('cart', []);
        return view('shops.cart', compact('cart'));
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        if ($cart[$product->id]) {
            $cart[$product->id]['quantite']--;
            if ($cart[$product->id]['quantite'] <= 0) {
                unset($cart[$product->id]);
            }
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }



    public function destroy(Product $product)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);
        return redirect()->back()->with("success", 'leproduit a été supprimer avec succès');
    }
}

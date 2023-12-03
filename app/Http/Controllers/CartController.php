<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartProducts = session('products');

        $products = [];
        $total = 0;

        foreach ($cartProducts as $cartProductId => $qty) {
            $product = Product::find($cartProductId);
            $product->qty = $qty;
            $total += $product->preco * $qty;
            if($product)
                $products[] = $product;
        }

        return view('cart.index',compact('products','total'));
    }

    public function add($id)
    {
        $products = session('products');

        if(!$products)
            $products = [];

        if(array_key_exists($id,$products))
            $products[$id] = $products[$id] + 1;
        else
            $products[$id] = 1;

        session(['products' => $products]);
        return redirect()->back()->with('message',"Produto adicionado ao carrinho com sucesso!");
    }

    public function subtract($id)
    {
        $products = session('products');

        if(!$products)
            $products = [];

        if(array_key_exists($id,$products))
            $products[$id] = $products[$id] - 1;

        if($products[$id] == 0)
            unset($products[$id]);

        session(['products' => $products]);
        return redirect()->back()->with('message',"Produto adicionado ao carrinho com sucesso!");
    }

    public function remove($id)
    {
        $products = session('products');

        if(array_key_exists($id,$products))
            unset($products[$id]);

        session(['products' => $products]);
        return redirect()->back()->with('message',"Produto removido do carrinho com sucesso!");
    }

}

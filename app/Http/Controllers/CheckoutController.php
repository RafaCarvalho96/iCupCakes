<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {
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
        return view('checkout.index',compact('products','total'));
    }

    public function store(Request $request) {
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
        $order = new Order();

        $order->email = Auth::user()->email;
        $order->valor_total = $total;
        $order->rua = $request->rua;
        $order->bairro = $request->bairro;
        $order->numero = $request->numero;
        $order->complemento = $request->complemento;
        $order->pagamento = $request->formaPagamento;
        $order->obs = $request->obs;

        $order->save();
        $line = 1;
        foreach ($products as $product) {
            $order->lines()->save(new OrderLine([
                'line_nbr' => $line,
                'product_id' => $product->id,
                'qty' => $product->qty,
                'unit_price' => $product->preco
            ]));
            $line++;
        }

        return redirect()->route('catalog.index')->with('message', "Pedido nº {$order->id} aberto com sucesso!");
    }
}

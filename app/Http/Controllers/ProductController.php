<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();

        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $preco = $request->preco;
        $imagem = $request->file('imagem');
        $extension = $imagem->getClientOriginalExtension();

        $product = new Product();
        $product->nome = $nome;
        $product->preco = $preco;
        $product->extension = $extension;
        $product->save();


        Storage::disk('public')->put("product/{$product->id}.{$extension}",file_get_contents($imagem));

        return redirect()->route("admin.product.index");
    }

    public function edit(int $id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, int $id)
    {
        $nome = $request->nome;
        $preco = $request->preco;
        $imagem = $request->file('imagem');

        $product = Product::find($id);
        $product->nome = $nome;
        $product->preco = $preco;

        if($imagem) {
            $extension = $imagem->getClientOriginalExtension();
            Storage::disk('public')->put("product/{$product->id}.{$extension}",file_get_contents($imagem));
            $product->extension = $extension;
        }

        $product->save();

        return redirect()->route("admin.product.index");
    }

    public function delete(int $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route("admin.product.index");
    }
}

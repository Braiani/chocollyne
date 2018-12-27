<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categoria;

class ShopController extends Controller
{
    public function show(Request $request, $produto)
    {
        $produto = Product::where('slug', $produto)->first();
        return view('single')->with([
            'produto' => $produto
        ]);
    }
    
    public function pesquisa(Request $request)
    {
        $produtos = Product::where('titulo', 'LIKE', "%{$request->produto}%")
                            ->orWhere('descricao', 'LIKE', "%{$request->produto}%")
                            ->paginate();
        $categorias = Categoria::all();
        return view('shop')->with([
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }
    
    public function showAll()
    {
        $produtos = Product::paginate();
        $categorias = Categoria::all();

        return view('shop')->with([
            'produtos' => $produtos,
            'categorias' => $categorias,
        ]);
    }
    
    public function showCategoria(Request $request, $categoria)
    {
        $categorias = Categoria::all();
        $categoria = Categoria::where('slug', $categoria)->first();
        $produtos = Product::where('categoria_id', $categoria->id)->paginate();
        return view('shop')->with([
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }
}

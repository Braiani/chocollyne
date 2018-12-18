<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PublicController extends Controller
{
    public function index()
    {
        $produtos = Product::all();
        $feat = Product::latest()->first();

        return view('welcome')->with([
            'feat' => $feat,
            'produtos' => $produtos,
            'destaques' => $produtos
        ]);
    }
    
    public function show(Request $request, $produto)
    {
        $produto = Product::where('slug', $produto)->first();
        return view('single')->with([
            'produto' => $produto
        ]);
    }
    
    public function pesquisa(Request $request)
    {
        return $request;
    }
    
    public function carrinho()
    {
        return 'Carrinho';
    }
    
    public function sobre()
    {
        return 'View Sobre-nos';
    }
    
    public function show_all()
    {
        $produtos = Product::paginate(2);

        return view('shop')->with([
            'produtos' => $produtos,
        ]);
    }
}

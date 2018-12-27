<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categoria;

class PublicController extends Controller
{
    public function index()
    {
        $produtos = Product::isAtivo()->get();
        $feat = Product::latest()->first();

        return view('welcome')->with([
            'feat' => $feat,
            'produtos' => $produtos,
            'destaques' => $produtos
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categoria;
use Canducci\ZipCode\ZipCodeTrait;

class PublicController extends Controller
{
    use ZipCodeTrait;
    public function index()
    {
        $produtos = Product::estaAtivo()->latest()->paginate();
        $feat = Product::estaAtivo()->inRandomOrder()->first();
//        $feat = Product::estaAtivo()->latest()->first();

        return view('welcome')->with([
            'feat' => $feat,
            'destaques' => $produtos
        ]);
    }
    
    public function buscaCep(Request $request, $cep)
    {
        $resposta = $this->zipcode($cep);
        return $resposta == null ? json_encode(['error' => true]) : $resposta->getJson();
    }
}

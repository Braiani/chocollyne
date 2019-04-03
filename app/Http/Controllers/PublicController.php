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
        $produtos = Product::estaAtivo()->get();
        $feat = Product::estaAtivo()->find(3);

        return view('welcome')->with([
            'feat' => $feat,
            'produtos' => $produtos,
            'destaques' => $produtos
        ]);
    }
    
    public function buscaCep(Request $request, $cep)
    {
        $resposta = $this->zipcode($cep);
        return $resposta == null ? json_encode(['error' => true]) : $resposta->getJson();
    }
}

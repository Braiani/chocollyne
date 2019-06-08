<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PedidoController extends Controller
{
    public function __invoke(Request $request)
    {
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $search = $request->get('search') ? $request->get('search') : false;
        $sort = $request->get('sort') ? $request->get('sort') : false;

        $query = new Pedido();

        $query = $query->when($search, function ($query, $search) {
            return $query->when(Str::contains($search, '#'), function ($query) use ($search) {
                return $query->where('id', Str::replaceFirst('#','', $search));
            }, function ($query) use ($search) {
                return $query->where('total', 'LIKE', "%{$search}%")
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('observacao', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")->orWhereHas('cliente', function ($q) use ($search) {
                        $q->where('nome', 'LIKE', "%{$search}%")->orWhere('email', 'LIKE', "%{$search}%")
                            ->orWhere('cpf', 'LIKE', "%{$search}%");
                    });
            });
        });

        if ($sort) {
            $query = $query->orderBy($sort, $request->get('order'));
        }

        $total = $query->count();

        $pedidos = $query->offset($offset)->limit($limit)->with(['desconto', 'produtos', 'cliente', 'produtos.sabores'])->get();

        $resposta = array(
            'total' => $total,
            'count' => $pedidos->count(),
            'rows' => $pedidos,
        );
        return $resposta;
    }
}

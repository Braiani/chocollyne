<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }
    
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    
    public function scopeEstaAtivo($query)
    {
        return $query->where('ativo', true);
    }
    
    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedido_produtos')->withPivot('preco', 'quantidade');
    }
}

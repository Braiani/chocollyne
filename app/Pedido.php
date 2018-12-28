<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];
    
    public function desconto()
    {
        return $this->belongsTo('App\Cupom', 'cupom_id');
    }
    
    public function produtos()
    {
        return $this->belongsToMany('App\Product', 'pedido_produtos');
    }
}

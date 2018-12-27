<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $guarded = [];
    
    public function scopeEstaValido($query)
    {
        return $query->whereDate('validade', '>=', date('Y-m-d'));
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}

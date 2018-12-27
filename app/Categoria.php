<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = [];
    
    public function produtos()
    {
        return $this->hasMany('App\Product');
    }
}

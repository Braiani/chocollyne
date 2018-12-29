<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cupom extends Model
{
    protected $guarded = [];
    
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }

        parent::save();
    }
    
    public function scopeEstaValido($query)
    {
        return $query->whereDate('validade', '>=', date('Y-m-d'));
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}

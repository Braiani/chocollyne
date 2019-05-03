<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Cliente extends User
{
    use Notifiable;
    
    protected $guarded = [];
    
    protected $hidden = [
        'password',
    ];

    public function scopeReceberNews($query)
    {
        return $query->where('receber_news', true);
    }
}

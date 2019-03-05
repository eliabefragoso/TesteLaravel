<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    function produtos() {
        return $this->belongsToMany('App\produto', 'vendedores_has_produtos')->withPivot('estoque');    
    }
}

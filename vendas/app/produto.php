<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    function vendedores() {
        return $this->belongsToMany("App\vendedor", "vendedores_has_produtos")->withPivot('estoque');
    }
}

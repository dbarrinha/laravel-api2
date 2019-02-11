<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retirada extends Model
{
    protected $fillable = ['quantidade','produto_id','usuario_id'];

    protected $dates = ['deleted_at'];

    function usuario() {
        return $this->belongsTo('App\Usuario');
    }
    function produto() {
        return $this->belongsTo('App\Produto');
    }
}

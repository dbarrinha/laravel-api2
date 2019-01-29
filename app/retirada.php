<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retirada extends Model
{
    protected $fillable = ['quantidade','produto_id','usuario_id'];

    protected $dates = ['deleted_at'];

    function usuario() {
        return $this->belongsTo('App\usuario');
    }
    function produto() {
        return $this->belongsTo('App\produto');
    }
}

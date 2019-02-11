<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'quantidade'];

    protected $dates = ['deleted_at'];

    public function retiradas()
    {
        return $this->hasMany('App\Retirada');
    }
}

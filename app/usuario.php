<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{	
	protected $fillable = ['nome','senha', 'usuario'];

    protected $dates = ['deleted_at'];
    
    public function retiradas()
    {
        return $this->hasMany('App\retirada');
    }
}

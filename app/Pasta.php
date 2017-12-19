<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{	
	
    protected $fillable = [
        'nome'
    ];


     public function subpasta(){
        return $this->hasMany('App\SubPasta');
    }

     public function link(){
        return $this->hasMany('App\Link');
    }

}

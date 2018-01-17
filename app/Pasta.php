<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{	
	
    protected $fillable = [
        'pasta','user_id',
    ];


     public function subpasta(){
        return $this->hasMany('App\SubPasta', 'pasta_id', 'id');
    }

     public function link(){
        return $this->hasMany('App\Link', 'pasta_id');
    }

     
}

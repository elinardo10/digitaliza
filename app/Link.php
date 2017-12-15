<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
     protected $fillable = [
        'nome','link', 'pasta_id', 'subpasta_id', 'user_id'
    ];


     public function pasta(){
        return $this->belongsTo('App\Pasta');
    }

     public function subpasta(){
        return $this->belongsTo('App\SubPasta');
    }

     public function user(){
        return $this->hasMany('App\User');
    }
}

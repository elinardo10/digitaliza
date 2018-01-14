<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
     protected $fillable = [
        'nome','link','user_id', 'pasta_id', 'subpasta_id'
    ];


     public function pasta(){
        return $this->belongsTo('App\Pasta');
    }

     public function subpasta(){
        return $this->belongsTo('App\SubPasta');
    }

     public function user(){
        return $this->belongsTo('App\User');
    }
}

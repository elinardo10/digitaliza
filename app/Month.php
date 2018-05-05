<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
     protected $fillable = [
        'name','subpasta_id',
    ];

     public function subpasta(){

        return $this->belongsTo('App\SubPasta');
    }

     public function link(){
        return $this->hasMany('App\Link');
    }
}

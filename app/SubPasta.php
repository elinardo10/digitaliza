<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPasta extends Model
{
    protected $fillable = [
        'nome','pasta_id',
    ];

public function pasta(){
       return $this->belongsTo('App\Pasta'); 
    }

    public function link(){
        return $this->hasMany('App\Link');
    }
}

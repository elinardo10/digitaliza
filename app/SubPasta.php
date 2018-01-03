<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPasta extends Model
{
    protected $fillable = [
        'subpasta','pasta_id',
    ];

public function pasta(){
       return $this->belongsTo('App\Pasta','pasta','id'); 
    }

    public function link(){
        return $this->hasMany('App\Link','subpasta_id','id');
    }
}

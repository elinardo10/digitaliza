<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPasta extends Model
{
    protected $fillable = [
        'subpasta','pasta_id','user_id',
    ];

public function pasta(){
       return $this->belongsTo('App\Pasta','pasta_id','id'); 
    }

    public function link(){
        return $this->hasMany('App\Link','subpasta_id','id');
    }

    

}

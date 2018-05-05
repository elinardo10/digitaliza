<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{   
  use Searchable;

  protected $fillable = [
  'name','link','slug','user_id', 'pasta_id', 'subpasta_id', 'month_id'
  ];

  public function searchableAs()
  {
    return 'links';
}


public function getRouteKeyName()
{
    return 'slug';
}

public function pasta(){
    return $this->belongsTo('App\Pasta');
}

public function subpasta(){
    return $this->belongsTo('App\SubPasta');
}

public function user(){
    return $this->belongsTo('App\User');
}

public function month(){
    return $this->belongsTo('App\Month');
}
}

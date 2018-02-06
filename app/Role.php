<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
        'name', 'label',
    ];

    public function permissions()
    {
       return $this->belongsToMany('App\Permission'); 
    }

      public function users()
    {
        return $this->belongsToMany(User::class, 'role_id');
    }
}

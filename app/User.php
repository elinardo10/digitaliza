<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(\App\Role::class);
    }


        public function hasPermission(Permission $permission)
    {
      return $this->hasAnyRoles($permission->roles);
    }


        public function hasAnyRoles($roles){

            if(is_array($roles) || is_object($roles) ) {

           foreach ($roles as $role) {
            //var_dump($role->name);
            if($this->roles->contains('name', $role->name))
                return true;
           
        }
        }
        
        return $this->roles->contains('name', $roles);
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
       
    }



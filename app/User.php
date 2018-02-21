<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{ use HasApiTokens, Notifiable;

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
    public function is($roleName){
      foreach ($this->roles()->get() as $key => $role) {
        if ($role->name == $roleName) {
          return true;
        }
      }
      return false;
    }
    public function post(){
      //put in the name space
      //defaults and looks in posts for user_id
      //specify by hasOne('App\Post','user_id','id')
      // ID being post.id
      return $this->hasOne('App\Post');

    }
    public function posts(){
      //put in the name space
      //defaults and looks in posts for user_id
      //specify by hasOne('App\Post','user_id','id')
      // ID being post.id
      return $this->hasMany('App\Post');

    }
    public function getRouteKeyName(){
      return 'name';
    }
    public function roles(){
      return $this->belongsToMany('App\Role');
    }

    public function photos(){
      return $this->morphMany('App\Photo','imageable');
    }
}

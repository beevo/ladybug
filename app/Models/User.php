<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
  use HasApiTokens, Notifiable;
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

  public function getRouteKeyName(){
    return 'name';
  }

  public function comments(){
    return $this->hasMany('App\Models\Comment','created_by');
  }

  public function bugs(){
    return $this->hasMany('App\Models\Bug','created_by');
  }

  public function assignedBugs(){
    return $this->belongsToMany('App\Models\Bug','bug_user','user_id','bug_id');
  }

  public function tags(){
    return $this->hasMany('App\Models\Tag','created_by');
  }
}

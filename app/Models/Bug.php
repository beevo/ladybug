<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Bug extends Model{
  use Userstamps;

  protected $fillable = [
    'title', 'description'
  ];

  public function assignees(){
    return $this->belongsToMany('App\Models\User','bug_user','bug_id','user_id');
  }

  public function tags(){
    return $this->belongsToMany('App\Models\Tag','bug_tag','bug_id','tag_id');
  }

  // public function user(){
  //   return $this->belongsTo('App\Models\User','created_by');
  // }
  //->creator created by UserStamps
}

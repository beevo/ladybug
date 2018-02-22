<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Bug extends Model{
  public function assignees(){
    return $this->belongsToMany('App\Models\User','bug_user','bug_id','user_id');
  }

  public function tags(){
    return $this->belongsToMany('App\Models\Tag','bug_tag','bug_id','tag_id');
  }
  //->creator created by UserStamps
}

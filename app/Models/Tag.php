<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Tag extends Model{
  use Userstamps;
  public function bugs(){
    $this->belongsToMany('App\Models\Bug','bug_tag','tag_id','bug_id');
  }
  public function user(){
    $this->belongsTo('App\Models\User','created_by');
  }
}

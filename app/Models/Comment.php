<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model{
  use Userstamps;
  use SoftDeletes;
  // ->created_by from userstamps
  public function bug(){
    $this->belongsTo('App\Models\Bug');
  }
  public function user(){
    $this->belongsTo('App\Models\User','created_by');
  }
}

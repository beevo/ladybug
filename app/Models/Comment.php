<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model{
  use Userstamps;
  use SoftDeletes;
  protected $fillable = [
    'content'
  ];
  // ->created_by from userstamps
  public function bug(){
    // return 1;
    return $this->belongsTo('App\Models\Bug');
  }

}

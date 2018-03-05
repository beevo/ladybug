<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model{
  use Userstamps;
  use SoftDeletes;
  protected $fillable = [
    'name', 'color'
  ];
  public function bugs(){
    return $this->belongsToMany('App\Models\Bug','bug_tag','tag_id','bug_id');
  }
  //Creator
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //1categ can have many jobs
  public function jobs(){
  return $this->hasMany(Job::class);
}


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    public function codingLanguage(){
        return $this->hasMany(CodingLanguage::class);
    }
}

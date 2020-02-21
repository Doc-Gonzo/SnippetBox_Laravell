<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function codingLanguage(){
        return $this->hasOne(CodingLanguage::class);
    }
    public function sammlung(){
        return $this->belongsToMany(Sammlung::class);
    }
}

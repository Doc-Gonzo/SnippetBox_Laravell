<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sammlung extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function snippet(){
        return $this->hasMany(Snippet::class);
    }
}

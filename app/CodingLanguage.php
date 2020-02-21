<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodingLanguage extends Model
{
    public function context(){
        return $this->hasMany(Context::class);
    }
}

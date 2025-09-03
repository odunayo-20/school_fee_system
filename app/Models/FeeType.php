<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    public $guarded  = [];


    public function feeType(){
        return $this->hasMany(FeeType::class);
    }
}

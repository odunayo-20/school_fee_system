<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{

    public $guarded = [];


    public function class(){
        return $this->belongsTo(ExternalClass::class, 'class_id');
    }

    public function session(){
        return $this->belongsTo(ExternalSession::class, 'session_id');
    }
    public function term(){
        return $this->belongsTo(ExternalTerm::class, 'term_id');
    }
    public function feeType(){
        return $this->belongsTo(FeeType::class, 'fee_type_id');
    }
}

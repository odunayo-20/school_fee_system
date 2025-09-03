<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    public $guarded = [];


    public function class(){
        return $this->belongsTo(ExternalClass::class, 'class_id');
    }

    public function academicYear(){
        return $this->belongsTo(ExternalSession::class, 'session_id');
    }
    public function term(){
        return $this->belongsTo(ExternalTerm::class, 'term_id');
    }
    public function student(){
        return $this->belongsTo(ExternalStudent::class, 'student_id');
    }
    public function feeType(){
        return $this->belongsTo(FeeType::class, 'fee_type_id');
    }
    public function feeStructure(){
        return $this->belongsTo(FeeStructure::class, 'fee_structure_id');
    }

}

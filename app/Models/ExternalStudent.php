<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalStudent extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'students'; // adjust if your table name is different


    public function class(){
        return $this->belongsTo(ExternalClass::class, 'current_class', 'id');
    }

    public function session(){
        return $this->belongsTo(ExternalSession::class, 'schoolSession_id');
    }

    // public function student(){
    //     return $this->hasMany(ExternalStudent::class, 'student_id');
    // }
}

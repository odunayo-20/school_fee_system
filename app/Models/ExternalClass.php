<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalClass extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'student_classes'; // adjust if your table name is different

    // public function class(){
    //     return $this->hasMany(ExternalClass::class, 'id');
    // }
}

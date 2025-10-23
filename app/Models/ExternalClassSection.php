<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalClassSection extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'class_sections'; // adjust if your table name is different



     public function class()
    {
        return $this->belongsTo(ExternalClass::class, 'class_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_section_id');
    }




}

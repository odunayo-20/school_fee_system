<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalAcademicYear extends Model
{
      protected $connection = 'mysql2';
    protected $table = 'academic_years';

    public function term(){
        return $this->belongsTo(ExternalTerm::class, 'term_id');
    }

    public function academicYear(){
        return $this->hasMany(ExternalSession::class, 'academic_year_id');
    }
}

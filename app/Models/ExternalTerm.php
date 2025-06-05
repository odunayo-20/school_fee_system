<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalTerm extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'semesters'; // adjust if your table name is different

}

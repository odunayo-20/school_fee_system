<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalSession extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'school_sessions';

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user-id',
        'company_name',
        'role_title',
        'status',
        'date_applied',
        'job_url',
        'email',
        'source',
        'updated_at'
    ];

    
}

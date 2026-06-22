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
        'updated_at',
        'user_id',
        'resume_version_id'
    ];

    //this application belongs to one resume version
    public function resumeVersion()
    {
        return $this->belongsTo(ResumeVersion::class);
    }
}

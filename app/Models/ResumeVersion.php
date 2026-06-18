<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResumeVersion extends Model
{
    protected $fillable = [
        'user-id',
        'label',
        'file_path',
        'created_at',
        'updated_at'
    ];

    public function manyApplications():HasMany {
        return $this->hasMany(Application::class);
    }
}

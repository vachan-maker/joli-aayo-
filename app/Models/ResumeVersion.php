<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResumeVersion extends Model
{
    protected $fillable = [
        'label',
        'file_path',
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function applications():HasMany {
        return $this->hasMany(Application::class);
    }
}

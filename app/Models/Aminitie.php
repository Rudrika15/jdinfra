<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aminitie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'projectid',
        'title',
        'icon'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, "projectid");
    }
}

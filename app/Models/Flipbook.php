<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flipbook extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'projectid',
        'imageurl'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, "projectid");
    }
}

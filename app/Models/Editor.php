<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;
    protected $fillable = [
        'projectid',
        'border_color',
        'body_color',
        'term_condition'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, "projectid");
    }
  
}

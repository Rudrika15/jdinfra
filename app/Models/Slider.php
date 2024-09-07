<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'subtitle',
        'navigation',
        'imageurl',
        'order'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'navigation',  'id');
    }
   
}

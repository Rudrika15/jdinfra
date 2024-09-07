<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'location',
        'description',
        'brochure',
        'map',
        'logo',
        'imageurl',
        'about'

    ];

    public function sectors()
    {
        return $this->hasMany(Sectormaster::class, 'projectid');
    }
    public function galleries()
    {
        return $this->hasMany(Projectgallery::class, 'projectid');
    }
    public function slider()
    {
        return $this->hasMany(Slider::class, 'navigation', 'id');
    }
    public function editor()
    {
        return $this->hasOne(Editor::class, 'projectid');
    }
}

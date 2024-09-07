<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sectormaster extends Model
{
    use HasFactory;
use SoftDeletes;
    protected $fillable = [ 
        'sectorname',
        'projectid'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, "projectid");
    }
    public function plot()
    {
        return $this->hasMany(Plotmaster::class, 'sectormasterid');
    }
}

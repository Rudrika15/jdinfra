<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable  =[
        'projectid',
        'sector_name',
        'plot_id',
        'x1',
        'y1',
        'x2',
        'y2',
        'x3',
        'y3',
        'x4',
        'y4',
        'x5',
        'y5',
        'x6',
        'y6'
    ];
}

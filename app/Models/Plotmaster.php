<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plotmaster extends Model
{
    use HasFactory;
    use  SoftDeletes ;

    protected $fillable = [
        'sectormasterid',
        'plotnumber',
        'area',
        'status',
    ];

    public function sector()
    {
        return $this->belongsTo(Sectormaster::class, "sectormasterid");
    }
    public function booking()
    {
        return $this->hasMany(Booking::class, 'plotid');
    }
}

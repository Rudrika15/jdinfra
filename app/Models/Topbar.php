<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'contact1',
        'contact2',
        'contact3',
        'email',
        'social_logo1',
        'social_logo2',
        'social_logo3',
    ];
}

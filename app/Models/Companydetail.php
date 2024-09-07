<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companydetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'projectid',
        'mobile',
        'address',
        'logo',
        'company_name',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, "projectid");
    }
}

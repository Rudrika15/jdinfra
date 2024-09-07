<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentcommission extends Model
{
    use HasFactory;
    protected $fillable = ([
        'agent_commission',
        'paid_agentcommission',
        'transection_date',
        'installment_id'
    ]);

    public function installment()
    {
        return $this->belongsTo(Installment::class, 'installment_id', 'id');
    }
}

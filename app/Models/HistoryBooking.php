<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryBooking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'booking_id',
        'plotid',
        'plotnumber',
        'area',
        'membershipno',
        'fullname',
        'fathername',
        'dob',
        'email',
        'mobile',
        'address',
        'doctype1',
        'docnumber1',
        'doctype2',
        'docnumber2',
        'nomineename',
        'relation',
        'nomineemobile',
        'nomineeaddress',
        'paymentmode',
        'date',
        'bankname',
        'chequeno',
        'upi',
        'agent',
        'agentmobile',
        'booking_amount',
        'agent_commisson',
        'sell_amount',
        'emi',
        'remarks',
    ];

    public function plot()
    {
        return $this->belongsTo(Plotmaster::class, 'plotid' , 'id');
    }

    public function installment()
    {
        return $this->hasMany(Installment::class , 'booking_id', 'booking_id');
    }
    


    public function user()
    {
        return $this->belongsTo(User::class, 'agent', 'id');
    }

}

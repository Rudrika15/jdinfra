<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'booking_id',
        'user_id',
        'trans_date',
        'paid_amount',
        'remain_amount',
        'new_emi_amount',
        'emi',
        'installment_no',
        'given_by',
        'status',
        'remarks',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }
    public function history()
    {
        return $this->belongsTo(HistoryBooking::class, 'booking_id', 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function agentcommission()
    {
        return $this->hasMany(Agentcommission::class, 'installment_id', 'id');
    }
}

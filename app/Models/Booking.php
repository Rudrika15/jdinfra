<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
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
        return $this->belongsTo(Plotmaster::class, 'plotid');
    }

    public function installment()
    {
        return $this->hasMany(Installment::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'agent', 'id');
    }
    public function move()
    {
        // Retrieve the attributes of the current booking
        $attributes = $this->attributes;

        // Remove the 'id' attribute from the attributes array
        unset($attributes['id']);

        // Create a new history booking instance
        $historyBooking = new HistoryBooking();

        // Set the booking_id in the history booking instance
        $historyBooking->booking_id = $this->id; // Assuming 'id' is the primary key of bookings table

        // Fill the history booking with the attributes of the current booking
        $historyBooking->fill($attributes);

        // Save the history booking instance to persist the record in the history_bookings table
        $historyBooking->save();

        // Delete the current booking from the bookings table
        $this->delete();
    }
}

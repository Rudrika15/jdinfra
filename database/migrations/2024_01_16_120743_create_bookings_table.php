<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plotid');
            $table->bigInteger('plotnumber');
            $table->string('membershipno');
            $table->string('fullname');
            $table->string('fathername');
            $table->date('dob');
            $table->string('email');
            $table->bigInteger('mobile');
            $table->string('address');
            $table->string('doctype1');
            $table->string('docnumber1');
            $table->string('doctype2');
            $table->string('docnumber2');
            $table->string('nomineename');
            $table->string('relation');
            $table->bigInteger('nomineemobile');
            $table->string('nomineeaddress');
            $table->string('paymentmode');
            $table->bigInteger('chequeno');
            $table->string('upi');
            $table->date('date');
            $table->string('bankname');
            $table->string('area');
            $table->string('agent');
            $table->bigInteger('agentmobile');
            $table->bigInteger('booking_amount');
            $table->bigInteger('agent_commisson');
            $table->bigInteger('sell_amount');
            $table->bigInteger('emi');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

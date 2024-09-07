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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('agentcode');
            $table->string('name');
            $table->bigInteger('mobile');
            $table->bigInteger('alternatemobile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('doctype');
            $table->string('docnumber');
            $table->string('address')->nullable();
            $table->string('usertype');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

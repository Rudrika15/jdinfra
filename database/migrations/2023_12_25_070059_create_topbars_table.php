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
        Schema::create('topbars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('contact1',13);
            $table->string('contact2',13);
            $table->string('contact3',13);
            $table->string('email')->unique();
            $table->string('social_logo1');
            $table->string('social_logo2');
            $table->string('social_logo3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topbars');
    }
};

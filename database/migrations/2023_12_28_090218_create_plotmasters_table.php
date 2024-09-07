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
        Schema::create('plotmasters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sectormasterid');
            $table->string('plotnumber');
            $table->string('area');
            $table->enum('status', ['Sold', 'Unsold', 'Hold'])->default('Unsold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plotmasters');
    }
};

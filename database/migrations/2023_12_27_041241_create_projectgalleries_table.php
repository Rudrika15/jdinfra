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
        Schema::create('projectgalleries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projectid');
            $table->string('title');
            $table->string('gallery_type');
            $table->string('imageurl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projectgalleries');
    }
};

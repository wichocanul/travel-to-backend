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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->json('coordinates');
            $table->json('images');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('categories');
            $table->string('nameEvent');
            $table->date('dayEvent'); // 'YYYY-MM-DD'
            $table->time('hourEvent'); // 'HH:mm'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};

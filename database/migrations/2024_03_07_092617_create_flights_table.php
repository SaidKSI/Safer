<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('airport_from_id');
            $table->unsignedBigInteger('airport_to_id');
            $table->decimal('price', 10, 2);
            $table->dateTime('departure_time');
            // Add other columns as needed

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
            $table->foreign('airport_from_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('airport_to_id')->references('id')->on('airports')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

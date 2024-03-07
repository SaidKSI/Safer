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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('Sb_name');
            $table->string('profile_picture');
            $table->string('instruction_image')->nullable();
            $table->string('instruction_pdf')->nullable();
            $table->string('prefix');
            $table->tinyInteger('shortTransaction');
            $table->tinyInteger('can_send')->default(1);
            $table->tinyInteger('can_receive')->default(1);
            $table->string('send_account')->default('123456');
            $table->string('transaction_name');
            $table->string('transaction_name_ar');
            $table->unsignedInteger('num_of_characters');
            $table->tinyInteger('only_digit')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};

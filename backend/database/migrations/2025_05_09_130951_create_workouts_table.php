<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('trainer_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('notes')->nullable();
            $table->string('status')->default('scheduled');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workouts');
    }
};
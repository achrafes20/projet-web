<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('join_date');
            $table->date('birth_date');
            $table->string('gender');
            $table->text('address');
            $table->string('emergency_contact');
            $table->string('health_notes')->nullable();
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('membership_id');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
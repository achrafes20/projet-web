<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('membership_id');
            $table->decimal('amount', 8, 2);
            $table->date('payment_date');
            $table->date('due_date');
            $table->string('payment_method');
            $table->string('status')->default('paid');
            $table->text('notes')->nullable();
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('phone', 11);
            $table->date('dob');
            $table->string('bloodgroup', 3);
            $table->string('sex', 6);
            $table->string('religion', 15);
            $table->string('birthcertificate', 17);
            $table->text('address');
            $table->text('image');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdetails');
    }
};

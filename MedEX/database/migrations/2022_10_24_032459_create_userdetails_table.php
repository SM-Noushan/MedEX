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
            $table->string('phone', 11)->nullable();
            $table->date('dob')->nullable();
            $table->string('bloodgroup', 3)->nullable();
            $table->string('sex', 6)->nullable();
            $table->string('religion', 15)->nullable();
            $table->string('birthcertificate', 17);
            $table->text('address')->nullable();
            $table->text('image')->nullable();
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

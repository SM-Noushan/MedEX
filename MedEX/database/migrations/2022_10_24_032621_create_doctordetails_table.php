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
        Schema::create('doctordetails', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('degrees', 70);
            $table->string('bloodgroup', 10);
            $table->string('sex', 6);
            $table->string('religion', 15);
            $table->string('email', 50)->unique();
            $table->string('department');
            $table->text('image');
            $table->string('phone1', 11)->unique();
            $table->string('phone2', 11)->nullable()->unique();
            $table->unsignedBigInteger('doctor_id');
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
        Schema::dropIfExists('doctordetails');
    }
};

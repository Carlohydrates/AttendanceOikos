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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('qr');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('extension')->nullable();
            $table->string('fetcher');
            $table->integer('level');
            $table->string('section');
            $table->string('enroll_status');
            $table->string('bday');
            $table->integer('age');
            $table->string('date_enrolled');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->integer('postal_code');
            $table->string('country');
            $table->string('nationality');
            $table->string('sex');
            $table->string('telephone_number');
            $table->string('mobile_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

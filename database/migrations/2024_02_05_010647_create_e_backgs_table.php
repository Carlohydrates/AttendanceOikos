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
        Schema::create('e_backgs', function (Blueprint $table) {
            $table->id('employee_id');

            //Mother
            $table->string('m_fname')->nullable();
            $table->string('m_lname')->nullable();
            $table->string('m_minitial')->nullable();
            $table->string('m_extension')->nullable();
            $table->string('m_bday')->nullable();
            $table->string('m_phone_number')->nullable();
            $table->string('m_address')->nullable();
            $table->string('m_city')->nullable();
            $table->string('m_region')->nullable();
            $table->integer('m_postal_code')->nullable();
            $table->string('m_country')->nullable();
            $table->string('m_nationality')->nullable();

            //Father
            $table->string('f_fname')->nullable();
            $table->string('f_lname')->nullable();
            $table->string('f_minitial')->nullable();
            $table->string('f_extension')->nullable();
            $table->string('f_bday')->nullable();
            $table->string('f_phone_number')->nullable();
            $table->string('f_address')->nullable();
            $table->string('f_city')->nullable();
            $table->string('f_region')->nullable();
            $table->integer('f_postal_code')->nullable();
            $table->string('f_country')->nullable();
            $table->string('f_nationality')->nullable();

            //Spouse
            $table->string('spouse_lname')->nullable();
            $table->string('spouse_fname')->nullable();
            $table->string('spouse_minitial')->nullable();
            $table->string('spouse_extension')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_employer')->nullable();
            $table->string('spouse_business_address')->nullable();
            $table->string('spouse_telephone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_backgs');
    }
};

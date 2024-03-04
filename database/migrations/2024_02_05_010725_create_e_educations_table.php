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
        Schema::create('e_educations', function (Blueprint $table) {
            $table->id('employee_id');
             //Gradeschool
            $table->string('gs_school');
            $table->string('gs_address');
            $table->string('gs_year');
            $table->string('gs_contact_person');
            $table->string('gs_phone_number');
            //Highschool
            $table->string('hs_school');
            $table->string('hs_address');
            $table->string('hs_year');
            $table->string('hs_contact_person');
            $table->string('hs_phone_number');
            //College
            $table->string('c_school');
            $table->string('c_address');
            $table->string('c_year');
            $table->string('c_contact_person');
            $table->string('c_phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_educations');
    }
};

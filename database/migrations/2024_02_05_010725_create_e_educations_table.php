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
            $table->string('gs_school')->nullable();
            $table->string('gs_address')->nullable();
            $table->string('gs_year')->nullable();
            $table->string('gs_contact_person')->nullable();
            $table->string('gs_phone_number')->nullable();
            //Highschool
            $table->string('hs_school')->nullable();
            $table->string('hs_address')->nullable();
            $table->string('hs_year')->nullable();
            $table->string('hs_contact_person')->nullable();
            $table->string('hs_phone_number')->nullable();
            //College
            $table->string('c_school')->nullable();
            $table->string('c_address')->nullable();
            $table->string('c_year')->nullable();
            $table->string('c_contact_person')->nullable();
            $table->string('c_phone_number')->nullable();
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

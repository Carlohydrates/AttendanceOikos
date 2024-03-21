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
        Schema::create('e_experiences', function (Blueprint $table) {
            $table->id('employee_id');
             //1st
             $table->string('company')->nullable();
             $table->string('company_address')->nullable();
             $table->string('company_jobtitle_position')->nullable();
             $table->string('company_contact')->nullable();
             $table->string('company_job_description')->nullable();
             $table->string('company_duration')->nullable();
             $table->string('company_phone_number')->nullable();
             //2nd
             $table->string('company2')->nullable();
             $table->string('company2_address')->nullable();
             $table->string('company2_jobtitle_position')->nullable();
             $table->string('company2_contact')->nullable();
             $table->string('company2_job_description')->nullable();
             $table->string('company2_duration')->nullable();
             $table->string('company2_phone_number')->nullable();
             //3rd
             $table->string('company3')->nullable();
             $table->string('company3_address')->nullable();
             $table->string('company3_jobtitle_position')->nullable();
             $table->string('company3_contact')->nullable();
             $table->string('company3_job_description')->nullable();
             $table->string('company3_duration')->nullable();
             $table->string('company3_phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_experiences');
    }
};

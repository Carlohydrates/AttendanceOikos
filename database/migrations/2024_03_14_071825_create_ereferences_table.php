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
        Schema::create('ereferences', function (Blueprint $table) {
            $table->id("employee_id");
            
            //1st
            $table->string("name_one")->nullable();
            $table->string("company_one")-> nullable();
            $table->string("contact_one")->nullable();
            $table->string("relation_one")->nullable();
            $table->string("position_one")->nullable();


            //2nd
            $table->string("name_two")->nullable();
            $table->string("company_two")->nullable();
            $table->string("contact_two")->nullable();
            $table->string("relation_two")->nullable();
            $table->string("position_two")->nullable();

            //3rd
            $table->string("name_three")->nullable();
            $table->string("company_three")->nullable();
            $table->string("contact_three")->nullable();
            $table->string("relation_three")->nullable();
            $table->string("position_three")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ereferences');
    }
};

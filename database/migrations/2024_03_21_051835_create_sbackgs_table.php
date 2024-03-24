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
        Schema::create('sbackgs', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('parent_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('telephone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sbackgs');
    }
};

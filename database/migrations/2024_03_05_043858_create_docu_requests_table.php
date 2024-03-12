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
        Schema::create('docu_requests', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('requestor_name');
            $table->string('request_code');
            $table->string('request_type');
            $table->string('date_requested');
            $table->string('date_processed')->nullable();
            $table->string('request_status');
            $table->text('reason');
            $table->string('filename')->nullable();
            $table->string('file_path')->nullable();
            $table->text('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docu_requests');
    }
};

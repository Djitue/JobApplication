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
        Schema::create('jobpostings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('employer_id'); // Foreign key for employer
            $table->string('job_title'); // Job title as a string
            $table->string('company_name'); // Company name as a string
            $table->string('location'); // Location as a string
            $table->text('job_requirement'); // Job requirement as text for longer descriptions
            $table->decimal('salary', 10, 2); // Salary as a decimal, nullable in case it's optional
            $table->enum('job_type', ['full-time', 'part-time', 'contract'])->default('full-time'); // Job type as an enum
            $table->date('deadline'); // Deadline as a date, nullable if optional


            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobpostings');
    }
};

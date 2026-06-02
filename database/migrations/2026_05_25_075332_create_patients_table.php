<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('patient_name');
            $table->string('patient_no')->unique();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('address');
            $table->string('diagnosis');
            $table->string('doctor_assigned');
            $table->enum('status', ['Active', 'Discharged', 'Critical'])->default('Active');
            $table->date('admission_date');
            $table->date('discharge_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
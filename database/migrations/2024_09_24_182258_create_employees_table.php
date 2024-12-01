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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code');                 // Added Code field
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('address')->nullable();   // Replaced Employee_Area with Address
            $table->string('cin');                  // Added CIN field
            $table->foreignId('province_id')->constrained()->onDelete('cascade');
            $table->string('picture')->nullable(); // Add this column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

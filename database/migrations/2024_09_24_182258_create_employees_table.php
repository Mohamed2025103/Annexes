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
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('id_number')->unique();
            $table->string('phone_number');
            $table->string('Employee_Area')->nullable();
            $table->foreignId("province_id")->constrained()->onDelete('cascade');
            $table->foreignId("city_id")->constrained()->onDelete('cascade'); // Add this line
            $table->timestamps();
            $table->dropForeign(['region_id']); // Drop the foreign key if it exists
            $table->dropColumn('region_id'); 
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

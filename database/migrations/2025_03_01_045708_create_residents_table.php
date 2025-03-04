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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('name', 100);
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date');
            $table->string('birth_place', 150);
            $table->text('address');
            $table->string('religion', 50)->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorce', 'widowed']);
            $table->string('occupation', 100)->nullable();
            $table->string('phone', 16);
            $table->enum('status', ['active', 'moved', 'deceased'])->default('active');
            $table->timestamps(); // Menggunakan timestamps() yang benar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
